<?php

namespace App\Http\Controllers\Admin;

use App\brand;
use App\color;
use App\Http\Controllers\Controller;
use App\size;
use Illuminate\Http\Request;

class AdminMasterController extends Controller
{
    public function brand()
    {
        $brands = brand::all();
        return view('admin.masterdata.brand',compact('brands'));
    }

    public function brand_save(Request $request)
    {
        $new_brand = new brand();
        $new_brand->brand_name = $request->brand_name;
        $new_brand->save();
        return back()->with('success','Brand Successfully Created');

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

    public function color_save(Request $request)
    {
        $new_color = new color();
        $new_color->color_name = $request->color_name;
        $new_color->save();

        return back()->with('success','Color Successfully Created');
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

    public function size_save(Request $request)
    {
        $new_size = new size();
        $new_size->size_name = $request->size_name;
        $new_size->save();

        return back()->with('success','Size Successfully Created');

    }


    public function size_update(Request $request)
    {
        $update_size = size::where('id',$request->edit_size)->first();
        $update_size->size_name = $request->size_name;
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
