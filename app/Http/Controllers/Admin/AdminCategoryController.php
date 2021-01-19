<?php

namespace App\Http\Controllers\Admin;

use App\end_level_category;
use App\Http\Controllers\Controller;
use App\mid_level_category;
use App\top_level_category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminCategoryController extends Controller
{
    public function top_category()
    {
        $top_cats = top_level_category::paginate(15);
        return view('admin.category.topCategory',compact('top_cats'));
    }

    public function top_category_get(Request $request)
    {
        $top_cat = top_level_category::all();
        return DataTables::of($top_cat)
            ->addColumn('action',function ($top_cat){
                return ' <button id="'.$top_cat->id .'" onclick="topcatupdate(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#updatetopcat"><i class="fas fa-edit"></i> </button>
                        <button id="'.$top_cat->id .'" onclick="topcatdelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletetopcat"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function top_category_save(Request $request)
    {
        $new_top_cate = new top_level_category();
        $new_top_cate->top_cat_name = $request->top_cat_name;
        $new_top_cate->save();
        return back()->with('success','Top Category Successfully Created');

    }


    public function top_category_single(Request $request)
    {
        $single_top_cat = top_level_category::where('id',$request->id)->first();
        return $single_top_cat;
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

    public function middle_category_get(Request $request)
    {
        $mid_cat = mid_level_category::with('top_cat')->get();
        return DataTables::of($mid_cat)
            ->addColumn('action',function ($mid_cat){
                return ' <button id="'.$mid_cat->id .'" onclick="midcatupdate(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#updatmidcat"><i class="fas fa-edit"></i> </button>
                        <button id="'.$mid_cat->id .'" onclick="midcatdelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletemidcat"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function middle_category_save(Request $request)
    {
        $mid_cat_save = new mid_level_category();
        $mid_cat_save->top_cat_id = $request->top_cat_id;
        $mid_cat_save->mid_cat_name = $request->mid_cat_name;
        $mid_cat_save->save();

        return back()->with('success','Middle Category Successfully Created');
    }


    public function middle_category_single(Request $request)
    {
        $mid_cat_single = mid_level_category::where('id',$request->id)->first();
        return $mid_cat_single;
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

    public function end_category_get(Request $request)
    {
        $end_cat = end_level_category::with('top_cat')->with('mid_cat')->get();
        return DataTables::of($end_cat)
            ->addColumn('action',function ($end_cat){
                return ' <button id="'.$end_cat->id .'" onclick="endcatupdate(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#updateendcat"><i class="fas fa-edit"></i> </button>
                        <button id="'.$end_cat->id .'" onclick="endcatdelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteendcategory"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
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

    public function end_category_single(Request $request)
    {
        $end_cat_single = end_level_category::where('id',$request->id)->first();
        return $end_cat_single;
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
