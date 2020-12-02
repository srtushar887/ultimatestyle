<?php

namespace App\Http\Controllers\Admin;

use App\blog;
use App\blog_category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminBlogController extends Controller
{
    public function blog_category()
    {
        $categories = blog_category::paginate(15);
        return view('admin.blog.blogCategory',compact('categories'));
    }

    public function blog_category_save(Request $request)
    {
        $new_blog_cat = new blog_category();
        $new_blog_cat->category_name = $request->category_name;
        $new_blog_cat->save();
        return back()->with('success','Blog Category Successfully Created');

    }

    public function blog_category_update(Request $request)
    {
        $update_blog_cat = blog_category::where('id',$request->blog_edit_category)->first();
        $update_blog_cat->category_name = $request->category_name;
        $update_blog_cat->save();
        return back()->with('success','Blog Category Successfully Updated');
    }

    public function blog_category_delete(Request $request)
    {
        $delete_blog_cat = blog_category::where('id',$request->blog_delete_category)->first();
        $delete_blog_cat->delete();

        return back()->with('success','Blog Category Successfully Deleted');
    }

    public function blog_lists()
    {
        $categories = blog_category::all();
        $blogs = blog::orderBy('id','desc')->paginate(20);
        return view('admin.blog.blogLists',compact('categories','blogs'));
    }

    public function blog_save(Request $request)
    {


        $new_blog = new blog();


        if($request->hasFile('blog_image')){
            $image = $request->file('blog_image');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/blog/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->resize(450,870)->save($imgUrl1);
            $new_blog->blog_image = $imgUrl1;
        }

        $new_blog->blog_cat_id = $request->blog_cat_id;
        $new_blog->blog_title = $request->blog_title;
        $new_blog->blog_des = $request->blog_des;
        $new_blog->save();

        return back()->with('success','Blog Successfully Created');


    }


    public function blog_update(Request $request)
    {
        $blog_update = blog::where('id',$request->blog_edit)->first();
        if($request->hasFile('blog_image')){
            @unlink($blog_update->blog_image);
            $image = $request->file('blog_image');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/blog/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->resize(450,870)->save($imgUrl1);
            $blog_update->blog_image = $imgUrl1;
        }

        $blog_update->blog_cat_id = $request->blog_cat_id;
        $blog_update->blog_title = $request->blog_title;
        $blog_update->blog_des = $request->blog_des;
        $blog_update->save();

        return back()->with('success','Blog Successfully Updated');
    }

    public function blog_delete(Request $request)
    {
        $blog_delete = blog::where('id',$request->blog_delete)->first();
        @unlink($blog_delete->blog_image);
        $blog_delete->delete();
        return back()->with('success','Blog Successfully Deleted');
    }
}
