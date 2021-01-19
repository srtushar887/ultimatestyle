<?php

namespace App\Http\Controllers\Admin;

use App\brand;
use App\color;
use App\Http\Controllers\Controller;
use App\size;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminMasterController extends Controller
{
    public function brand()
    {
        $brands = brand::all();
        return view('admin.masterdata.brand',compact('brands'));
    }

    public function brand_get(Request $request)
    {

        $brands = brand::get();
        return DataTables::of($brands)
            ->addColumn('action',function ($brands){
                return ' <button id="'.$brands->id .'" onclick="brandsupdate(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#updatebrands"><i class="fas fa-edit"></i> </button>
                        <button id="'.$brands->id .'" onclick="branddelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletebrand"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function brand_save(Request $request)
    {
        $new_brand = new brand();
        $new_brand->brand_name = $request->brand_name;
        $new_brand->save();
        return back()->with('success','Brand Successfully Created');

    }

    public function brand_single(Request $request)
    {
        $brands = brand::where('id',$request->id)->first();
        return $brands;
    }


    public function brand_update(Request $request)
    {
        $update_brand = brand::where('id',$request->edit_brand)->first();
        $update_brand->brand_name = $request->brand_name;
        $update_brand->save();
        return back()->with('success','Brand Successfully Updated');
    }

    public function brand_delete(Request $request)
    {
        $delete_brand = brand::where('id',$request->delete_brand)->first();
        $delete_brand->delete();
        return back()->with('success','Brand Successfully Deleted');
    }


    public function color()
    {
        $colors = color::all();
        return view('admin.masterdata.color',compact('colors'));
    }


    public function color_get(Request $request)
    {
        $colors = color::get();
        return DataTables::of($colors)
            ->addColumn('action',function ($colors){
                return ' <button id="'.$colors->id .'" onclick="colorupdate(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#updatecolor"><i class="fas fa-edit"></i> </button>
                        <button id="'.$colors->id .'" onclick="colordelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletecolors"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function color_save(Request $request)
    {
        $new_color = new color();
        $new_color->color_name = $request->color_name;
        $new_color->save();

        return back()->with('success','Color Successfully Created');
    }


    public function color_single(Request $request){
        $color_single = color::where('id',$request->id)->first();
        return $color_single;
    }


    public function color_update(Request $request)
    {
        $update_color = color::where('id',$request->edit_color)->first();
        $update_color->color_name = $request->color_name;
        $update_color->save();

        return back()->with('success','Color Successfully Updated');
    }


    public function color_delete(Request $request)
    {
        $delete_color = color::where('id',$request->delete_color)->first();
        $delete_color->delete();
        return back()->with('success','Color Successfully Deleted');
    }

    public function size()
    {
        $sizes = size::all();
        return view('admin.masterdata.size',compact('sizes'));
    }

    public function size_get(Request $request)
    {
        $sized = size::get();
        return DataTables::of($sized)
            ->addColumn('action',function ($sized){
                return ' <button id="'.$sized->id .'" onclick="sizeupdate(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#upatesize"><i class="fas fa-edit"></i> </button>
                        <button id="'.$sized->id .'" onclick="sizedelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesize"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function size_save(Request $request)
    {
        $new_size = new size();
        $new_size->size_name = $request->size_name;
        $new_size->size_price = $request->size_price;
        $new_size->save();

        return back()->with('success','Size Successfully Created');

    }


    public function size_single(Request $request)
    {
        $size_single = size::where('id',$request->id)->first();
        return $size_single;
    }


    public function size_update(Request $request)
    {
        $update_size = size::where('id',$request->edit_size)->first();
        $update_size->size_name = $request->size_name;
        $update_size->size_price = $request->size_price;
        $update_size->save();

        return back()->with('success','Size Successfully Updated');
    }


    public function size_delete(Request $request)
    {
        $delete_size = size::where('id',$request->delete_size)->first();
        $delete_size->delete();

        return back()->with('success','Size Successfully Deleted');

    }
}
