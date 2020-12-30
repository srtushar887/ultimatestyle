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
use Intervention\Image\Facades\Image;

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


        $new_product->product_name = $request->product_name;
        $new_product->old_price = $request->old_price;
        $new_product->current_price = $request->current_price;
        $new_product->product_top_cat_id = $request->product_top_cat_id;
        $new_product->product_mid_cat_id = $request->product_mid_cat_id;
        $new_product->product_end_cat_id = $request->product_end_cat_id;
        $new_product->brand_id = $request->brand_id;
        $new_product->sort_des = $request->sort_des;
        $new_product->description = $request->description;
        $new_product->min_del_date = $request->min_del_date;
        $new_product->max_del_date = $request->max_del_date;
        $new_product->is_publish = $request->is_publish;


        $frm_sizes = $request->size_id;
        $frm_color = $request->color_id;

        if ($new_product->save()){

            if ($frm_color){
                for ($i=0;$i<count($frm_color);$i++){
                    $new_product_color = new product_color();
                    $new_product_color->product_id = $new_product->id;
                    $new_product_color->color_id = $frm_color[$i];
                    $new_product_color->save();
                }
            }

            if ($frm_sizes){
                for ($i=0;$i<count($frm_sizes);$i++){
                    $new_product_size = new product_size();
                    $new_product_size->product_id = $new_product->id;
                    $new_product_size->size_id = $frm_sizes[$i];
                    $new_product_size->save();
                }
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



        $update_product->product_name = $request->product_name;
        $update_product->old_price = $request->old_price;
        $update_product->current_price = $request->current_price;
        $update_product->product_top_cat_id = $request->product_top_cat_id;
        $update_product->product_mid_cat_id = $request->product_mid_cat_id;
        $update_product->product_end_cat_id = $request->product_end_cat_id;
        $update_product->brand_id = $request->brand_id;
        $update_product->sort_des = $request->sort_des;
        $update_product->description = $request->description;
        $update_product->min_del_date = $request->min_del_date;
        $update_product->max_del_date = $request->max_del_date;
        $update_product->is_publish = $request->is_publish;


        $frm_sizes = $request->size_id;
        $frm_color = $request->color_id;

        if (empty($frm_sizes)){
            $frm_sizes = [];
        }

        if (empty($frm_color))
        {
            $frm_color = [];
        }


        if ($update_product->save())
        {
            if (count($frm_sizes) > 0){
                for ($i = 0; $i < count($frm_sizes); $i++) {
                    $exist_sz = product_size::where('product_id', $update_product->id)->where('size_id', $frm_sizes[$i])->get();
                    if (count($exist_sz) > 0) {
                        foreach ($exist_sz as $exda) {
                            $dtsz = product_size::where('id', $exda->id)->first();
                            $dtsz->size_id = $frm_sizes[$i];
                            $dtsz->save();
                        }
                    } else {
                        $new_sz_sv = new product_size();
                        $new_sz_sv->product_id = $update_product->id;
                        $new_sz_sv->size_id = $frm_sizes[$i];
                        $new_sz_sv->save();
                    }
                }
            }


            if (count($frm_color) > 0){
                for ($i=0;$i<count($frm_color);$i++){
                    $esist_color = product_color::where('product_id',$update_product->id)->where('color_id',$frm_color[$i])->get();
                    if (count($esist_color) > 0)
                    {
                        foreach ($esist_color as $excil){
                            $excldt = product_color::where('id',$excil->id)->first();
                            $excldt->color_id = $frm_color[$i];
                            $excldt->save();

                        }
                    }else{
                        $sav_new_cl = new product_color();
                        $sav_new_cl->product_id = $update_product->id;
                        $sav_new_cl->color_id = $frm_color[$i];
                        $sav_new_cl->save();
                    }
                }
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
