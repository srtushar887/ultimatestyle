<?php

namespace App\Http\Controllers\Admin;

use App\end_level_category;
use App\Http\Controllers\Controller;
use App\mid_level_category;
use App\top_level_category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function top_category()
    {
        $top_cats = top_level_category::paginate(15);
        return view('admin.category.topCategory',compact('top_cats'));
    }

    public function top_category_save(Request $request)
    {
        $new_top_cate = new top_level_category();
        $new_top_cate->top_cat_name = $request->top_cat_name;
        $new_top_cate->save();
        return back()->with('success','Top Category Successfully Created');

    }


    public function top_category_update(Request $request)
    {
        $update_top_cat = top_level_category::where('id',$request->edit_category)->first();
        $update_top_cat->top_cat_name = $request->top_cat_name;
        $update_top_cat->save();
        return back()->with('success','Top Category Successfully Updated');
    }

    public function top_category_delete(Request $request)
    {
        $delete_top_cat = top_level_category::where('id',$request->delete_category)->first();
        $delete_top_cat->delete();
        return back()->with('success','Top Category Successfully Deleted');
    }


    public function middle_category()
    {
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::paginate(15);
        return view('admin.category.middleCategory',compact('top_cats','mid_cats'));
    }

    public function middle_category_save(Request $request)
    {
        $mid_cat_save = new mid_level_category();
        $mid_cat_save->top_cat_id = $request->top_cat_id;
        $mid_cat_save->mid_cat_name = $request->mid_cat_name;
        $mid_cat_save->save();

        return back()->with('success','Middle Category Successfully Created');
    }

    public function middle_category_update(Request $request)
    {
        $update_mid_cat = mid_level_category::where('id',$request->edit_category)->first();
        $update_mid_cat->top_cat_id = $request->top_cat_id;
        $update_mid_cat->mid_cat_name = $request->mid_cat_name;
        $update_mid_cat->save();

        return back()->with('success','Middle Category Successfully Updated');
    }

    public function middle_category_delete(Request $request)
    {
        $del_mid_cat = mid_level_category::where('id',$request->delete_category)->first();
        $del_mid_cat->delete();
        return back()->with('success','Middle Category Successfully Deleted');
    }


    public function end_category()
    {
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::all();
        $end_cats = end_level_category::paginate(15);
        return view('admin.category.endCategory',compact('top_cats','mid_cats','end_cats'));
    }

    public function end_category_save(Request $request)
    {
        $new_end_cat = new end_level_category();
        $new_end_cat->top_cat_id = $request->top_cat_id;
        $new_end_cat->mid_cat_id = $request->mid_cat_id;
        $new_end_cat->end_cat_name = $request->end_cat_name;
        $new_end_cat->save();

        return back()->with('success','End Category Successfully Created');

    }

    public function end_category_update(Request $request)
    {
        $update_end_cat = end_level_category::where('id',$request->edit_category)->first();
        $update_end_cat->top_cat_id = $request->top_cat_id;
        $update_end_cat->mid_cat_id = $request->mid_cat_id;
        $update_end_cat->end_cat_name = $request->end_cat_name;
        $update_end_cat->save();

        return back()->with('success','End Category Successfully Updated');
    }

    public function end_category_delete(Request $request)
    {
        $delete_end_delete = end_level_category::where('id',$request->delete_category)->first();
        $delete_end_delete->delete();
        return back()->with('success','End Category Successfully Deleted');
    }
}
