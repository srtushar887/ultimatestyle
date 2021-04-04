<?php

namespace App\Http\Controllers\Admin;

use App\brand;
use App\color;
use App\end_level_category;
use App\Http\Controllers\Controller;
use App\mid_level_category;
use App\product;
use App\product_color;
use App\product_size;
use App\size;
use App\top_level_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdminProductController extends Controller
{
    public function product()
    {


//        $products = product::all();
//
//
//        foreach ($products as $pro)
//        {
//            $image = $pro->main_image;
//            $imageName = uniqid().time().'.'."jpg";
//            $directory = 'assets/admin/images/product/';
//            $imgUrl2  = $directory.$imageName;
//            Image::make($image)->resize(700,500)->save($imgUrl2);
//            @unlink($pro->main_image);
//            $pro->main_image = $imgUrl2;
//            $pro->save();
//
//        }







        $products = product::orderBy('id','desc')->paginate(15);
        return view('admin.product.productList',compact('products'));
    }


    public function product_get(Request $request)
    {
        $products = DB::table('products')->get();
        return DataTables::of($products)
            ->addColumn('action',function ($products){
                return ' <a href="'.route('admin.product.edit',$products->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-edit"></i> </button></a>
                        <button id="'.$products->id .'" onclick="productdelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteproduct"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function product_create(Request $request)
    {
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::all();
        $end_cats = end_level_category::all();
        $brand = brand::all();
        $color = color::all();
        $size = size::all();
        return view('admin.product.productCreate',compact('top_cats','mid_cats','end_cats','brand','color','size'));
    }

    public function product_save(Request $request)
    {
        $new_product = new product();

        if($request->hasFile('main_image')){
            $image = $request->file('main_image');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl1);
            $new_product->main_image = $imgUrl1;
        }

        if($request->hasFile('image_one')){
            $image = $request->file('image_one');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl2);
            $new_product->image_one = $imgUrl2;
        }

        if($request->hasFile('image_two')){
            $image = $request->file('image_two');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl3  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl3);
            $new_product->image_two = $imgUrl3;
        }

        if($request->hasFile('image_three')){
            $image = $request->file('image_three');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl4  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl4);
            $new_product->image_three = $imgUrl4;
        }

        if($request->hasFile('image_four')){
            $image = $request->file('image_four');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl5  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl5);
            $new_product->image_four = $imgUrl5;
        }

        if($request->hasFile('image_five')){
            $image = $request->file('image_five');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl6  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl6);
            $new_product->image_five = $imgUrl6;
        }

        if($request->hasFile('product_size_image')){
            $image = $request->file('product_size_image');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl6  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl6);
            $new_product->product_size_image = $imgUrl6;
        }


        $new_product->product_name = $request->product_name;
        $new_product->old_price = $request->old_price;
        $new_product->current_price = $request->current_price;
        $new_product->product_top_cat_id = $request->product_top_cat_id;
        $new_product->product_mid_cat_id = $request->product_mid_cat_id;
        $new_product->product_end_cat_id = $request->product_end_cat_id;
        $new_product->brand_id = $request->brand_id;
        $new_product->sort_des = $request->sort_des;
        $new_product->description = $request->description;
        $new_product->extra_description = $request->extra_description;
        $new_product->min_del_date = $request->min_del_date;
        $new_product->max_del_date = $request->max_del_date;
        $new_product->is_publish = $request->is_publish;
        $new_product->size_status = $request->size_status;
        $new_product->curier_status = $request->curier_status;
        $new_product->save();

        $color_data = $request->color_id;
        if ($color_data){
            for ($i=0;$i<count($color_data);$i++){
                $new_prc_ac = new product_color();
                $new_prc_ac->product_id = $new_product->id;
                $new_prc_ac->color_id = $color_data[$i];
                $new_prc_ac->save();
            }
        }


        $size_data = $request->size_id;
        if ($size_data){
            for ($i=0;$i<count($size_data);$i++){
                $new_prc_ac = new product_size();
                $new_prc_ac->product_id = $new_product->id;
                $new_prc_ac->size_id = $size_data[$i];
                $new_prc_ac->save();
            }
        }

        return back()->with('success','Product Successfully Created');
    }

    public function product_edit($id)
    {
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::all();
        $end_cats = end_level_category::all();
        $brand = brand::all();
        $color = color::all();
        $size = size::all();
        $product = product::where('id',$id)->first();
        $products_colors = product_color::where('product_id',$id)->get();
        $products_sizes = product_size::where('product_id',$id)->get();
        return view('admin.product.productEdit',compact('top_cats','mid_cats','end_cats','brand','color','size','product','products_colors','products_sizes'));
    }

    public function product_edit_color_delete(Request $request)
    {
        $color_id = product_color::where('id',$request->id)->first();
        $color_id->delete();
    }

    public function product_edit_size_delete(Request $request)
    {

        $size_id = product_size::where('id',$request->id)->first();
        $size_id->delete();
    }



    public function product_update(Request $request)
    {
        $update_product = product::where('id',$request->product_edit_id)->first();


        if($request->hasFile('main_image')){
            @unlink($update_product->main_image);
            $image = $request->file('main_image');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->resize(500,500)->save($imgUrl1);
            $update_product->main_image = $imgUrl1;
        }

        if($request->hasFile('image_one')){
            @unlink($update_product->image_one);
            $image = $request->file('image_one');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl2);
            $update_product->image_one = $imgUrl2;
        }

        if($request->hasFile('image_two')){
            @unlink($update_product->image_two);
            $image = $request->file('image_two');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl3  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl3);
            $update_product->image_two = $imgUrl3;
        }

        if($request->hasFile('image_three')){
            @unlink($update_product->image_three);
            $image = $request->file('image_three');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl4  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl4);
            $update_product->image_three = $imgUrl4;
        }

        if($request->hasFile('image_four')){
            @unlink($update_product->image_four);
            $image = $request->file('image_four');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl5  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl5);
            $update_product->image_four = $imgUrl5;
        }

        if($request->hasFile('image_five')){
            @unlink($update_product->image_five);
            $image = $request->file('image_five');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl6  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl6);
            $update_product->image_five = $imgUrl6;
        }

        if($request->hasFile('product_size_image')){
            @unlink($update_product->product_size_image);
            $image = $request->file('product_size_image');
            $imageName = uniqid().time().'.'."jpg";
            $directory = 'assets/admin/images/product/';
            $imgUrl6  = $directory.$imageName;
            Image::make($image)->resize(500,300)->save($imgUrl6);
            $update_product->product_size_image = $imgUrl6;
        }



        $update_product->product_name = $request->product_name;
        $update_product->old_price = $request->old_price;
        $update_product->current_price = $request->current_price;
        $update_product->product_top_cat_id = $request->product_top_cat_id;
        $update_product->product_mid_cat_id = $request->product_mid_cat_id;
        $update_product->product_end_cat_id = $request->product_end_cat_id;
        $update_product->brand_id = $request->brand_id;
        $update_product->sort_des = $request->sort_des;
        $update_product->description = $request->description;
        $update_product->extra_description = $request->extra_description;
        $update_product->min_del_date = $request->min_del_date;
        $update_product->max_del_date = $request->max_del_date;
        $update_product->is_publish = $request->is_publish;
        $update_product->size_status = $request->size_status;
        $update_product->curier_status = $request->curier_status;
        $update_product->save();

        $color_data = $request->color_id;
        product_color::where('product_id',$update_product->id)->delete();
        if (isset($color_data)){

            for ($i=0;$i<count($color_data);$i++){
                $new_prc_ac = new product_color();
                $new_prc_ac->product_id = $update_product->id;
                $new_prc_ac->color_id = $color_data[$i];
                $new_prc_ac->save();
            }
        }



        $size_data = $request->size_id;
        product_size::where('product_id',$update_product->id)->delete();
        if (isset($size_data)){

            for ($i=0;$i<count($size_data);$i++){
                $new_prc_ac = new product_size();
                $new_prc_ac->product_id = $update_product->id;
                $new_prc_ac->size_id = $size_data[$i];
                $new_prc_ac->save();
            }
        }

        return back()->with('success','Product Successfuly Updated');




    }


    public function product_delete(Request $request)
    {
        $product_delete = product::where('id',$request->product_delete_id)->first();

        $colors = product_color::where('product_id',$product_delete->id)->get();

        foreach ($colors as $color)
        {
            product_color::where('id',$color->id)->delete();
        }


        $sizes = product_size::where('product_id',$product_delete->id)->get();

        foreach ($sizes as $size)
        {
            product_size::where('id',$size->id)->delete();
        }

        @unlink($product_delete->main_image);
        @unlink($product_delete->image_one);
        @unlink($product_delete->image_two);
        @unlink($product_delete->image_three);
        @unlink($product_delete->image_four);
        @unlink($product_delete->image_five);
        $product_delete->delete();
        return back()->with('success','Product Successfully Deleted');

    }
}
