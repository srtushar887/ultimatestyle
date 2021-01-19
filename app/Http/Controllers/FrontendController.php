<?php

namespace App\Http\Controllers;

use App\blog;
use App\blog_category;
use App\blog_comment;
use App\brand;
use App\contact_us_data;
use App\end_level_category;
use App\home_slider;
use App\mid_level_category;
use App\news_latter;
use App\product;
use App\product_color;
use App\product_review;
use App\product_size;
use App\static_section;
use App\testimonial;
use App\top_level_category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $latest_product = product::where('is_publish', 1)->orderBy('id', 'desc')->limit(10)->get();
        $is_hot_deal_product = product::where('is_publish', 1)->where('is_hot_deal',1)->get();
        $top_categories = top_level_category::all();
        $sliders = home_slider::all();
        $latest_blog = blog::inRandomOrder()->limit(5)->get();
        $tesimonials = testimonial::orderBy('id','desc')->get();
        $static_data = static_section::first();
        return view('frontend.index', compact('top_categories', 'latest_product','sliders','latest_blog','is_hot_deal_product','tesimonials','static_data'));
    }

    public function all_products()
    {
        $products = product::where('is_publish', 1)->orderBy('id', 'desc')->paginate(8);
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::all();
        $end_cats = end_level_category::all();
        $brands = brand::all();
        $static_data = static_section::first();
        return view('frontend.allProducts', compact('products', 'top_cats', 'mid_cats', 'end_cats', 'brands','static_data'));
    }

    public function main_category_products($id)
    {
        $products = product::where('product_top_cat_id',$id)->where('is_publish',1)->orderBy('id', 'desc')->paginate(12);
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::all();
        $end_cats = end_level_category::all();
        $brands = brand::all();
        $cat_id = $id;
        $static_data = static_section::first();
        return view('frontend.mainCategoryProducts', compact('products', 'top_cats', 'mid_cats', 'end_cats', 'brands','cat_id','static_data'));
    }

    public function middle_category_products($id)
    {
        $products = product::where('product_mid_cat_id',$id)->where('is_publish', 1)->orderBy('id', 'desc')->paginate(12);
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::all();
        $end_cats = end_level_category::all();
        $brands = brand::all();
        $cat_id = $id;
        $static_data = static_section::first();
        return view('frontend.middleCategoryProducts', compact('products', 'top_cats', 'mid_cats', 'end_cats', 'brands','cat_id','static_data'));
    }

    public function end_category_products($id)
    {

        $products = product::where('product_end_cat_id',$id)->where('is_publish', 1)->orderBy('id', 'desc')->paginate(12);
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::all();
        $end_cats = end_level_category::all();
        $brands = brand::all();
        $cat_id = $id;
        $static_data = static_section::first();
        return view('frontend.endCategoryProducts', compact('products', 'top_cats', 'mid_cats', 'end_cats', 'brands','cat_id','static_data'));
    }


    public function product_search(Request $request)
    {
        $search = $request->search;
        $products = product::where('product_name','LIKE','%'.$search.'%')->paginate(12);
        $products->appends(['search' => $search]);
        $top_cats = top_level_category::all();
        $mid_cats = mid_level_category::all();
        $end_cats = end_level_category::all();
        $static_data = static_section::first();
        return view('frontend.searchProducts', compact('products', 'top_cats', 'mid_cats', 'end_cats','static_data','search'));

    }



    public function product_end_category($id)
    {
        $products = product::where('product_end_cat_id',$id)->paginate(16);
        return view('frontend.productEndCategory',compact('products'));
    }


    public function about_us()
    {
        $about = static_section::first();
        return view('frontend.aboutUs',compact('about'));
    }


    public function blogs()
    {
        $blogs = blog::orderBy('id','desc')->paginate(3);
        $blog_categories = blog_category::inRandomOrder()->limit(5)->get();
        $static_data = static_section::first();
        return view('frontend.blogs',compact('blogs','blog_categories','static_data'));
    }


    public function blog_details($id)
    {
        $blogs = blog::where('id',$id)->first();
        $blog_categories = blog_category::inRandomOrder()->limit(5)->get();
        $blog_comments = blog_comment::where('blog_id',$id)->orderBy('id','desc')->get();
        $static_data = static_section::first();
        return view('frontend.blogDetails',compact('blogs','blog_categories','blog_comments','static_data'));
    }


    public function blog_comment_save(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'comment' => 'required',
        ]);

        $new_blog_comment = new blog_comment();
        $new_blog_comment->blog_id = $request->blog_id;
        $new_blog_comment->name = $request->name;
        $new_blog_comment->comment = $request->comment;
        $new_blog_comment->save();
        return back()->with('success','Blog Comment Successfully Created');


    }


    public function blog_search(Request $request)
    {
        $search = $request->search;
        $blogs = blog::where('blog_title','LIKE',"%$search%")->orderBy('id','desc')->paginate(3);
        $blog_categories = blog_category::inRandomOrder()->limit(5)->get();
        return view('frontend.blogSearch',compact('blogs','blog_categories','search'));
    }

    public function blog_category_view($id)
    {
        $blogs = blog::where('blog_cat_id',$id)->orderBy('id','desc')->paginate(3);
        $blog_categories = blog_category::inRandomOrder()->limit(5)->get();
        $static_data = static_section::first();
        return view('frontend.blogs',compact('blogs','blog_categories','static_data'));
    }


    public function contact_us()
    {
        return view('frontend.contactUs');
    }



    public function contact_us_save(Request $request)
    {


        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);


        $new_con = new contact_us_data();
        $new_con->name = $request->name;
        $new_con->email = $request->email;
        $new_con->subject = $request->subject;
        $new_con->message = $request->message;
        $new_con->status = 1;
        $new_con->save();

        return back()->with('success','Message Successfully Send');


    }







    public function product_details($id)
    {
        $product = product::where('id',$id)->first();
        $colors = product_color::where('product_id',$id)->get();
        $sizes = product_size::where('product_id',$id)->get();
        $related_product = product::where('is_publish',1)
            ->where('id','!=',$product->id)
            ->where('product_top_cat_id',$product->product_top_cat_id)
            ->inRandomOrder()->limit(10)->get();
        $static_data = static_section::first();
        return view('frontend.productDetails',compact('product','colors','sizes','related_product','static_data'));
    }

    public function product_review_save(Request $request)
    {
        $new_revieew = new product_review();
        $new_revieew->product_review_id = $request->product_review_id;
        $new_revieew->quality = $request->quality;
        $new_revieew->name = $request->name;
        $new_revieew->message = $request->message;
        $new_revieew->save();

        return back()->with('success','Thanks For Giving Review');

    }



    public function add_to_cart_single(Request $request)
    {


        $product = product::where('id',$request->product_id)->first();

        $data['qty'] = $request->quantity;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['price'] = $product->current_price;
        $data['weight'] = 550;
        $data['options']['image'] = $product->main_image;
        $data['options']['size'] = $request->color;
        $data['options']['color'] = $request->size;
        $data['options']['dmimday'] = $product->min_del_date;
        $data['options']['dmaxday'] = $product->max_del_date;

        Cart::add($data);
        return back()->with('success','Product Cart Added Successfully');
    }


    public function add_to_cart_single_delete($id)
    {
        Cart::remove($id);
        return back();
    }


    public function cart_details()
    {
        return view('frontend.cartDetails');
    }

    public function privacy_policy()
    {
        $privacy = static_section::first();
        return view('frontend.privacyPolicy',compact('privacy'));
    }

    public function terms_condition()
    {
        $terms = static_section::first();
        return view('frontend.termsCondition',compact('terms'));
    }



    public function news_later_save(Request $request)
    {
        $new_news_email = new news_latter();
        $new_news_email->email = $request->em;
        $new_news_email->save();



    }


    public function search_product(Request $request)
    {
        $search = $request->search;
        $products = product::where('status', 1)->orderBy('id', 'desc')->paginate(8);
        $top_cats = top_category::all();
        $mid_cats = middle_category::all();
        $end_cats = end_category::all();
        $brands = brand::all();
        return view('frontend.searchProduct',compact('search','products','top_cats','mid_cats','end_cats','brands'));

    }


}
