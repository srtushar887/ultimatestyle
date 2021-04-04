<?php

namespace App\Http\Controllers\Admin;

use App\contact_us_data;
use App\home_slider;
use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use App\Mail\NewsLatterEmail;
use App\news_latter;
use App\social_icon;
use App\static_section;
use App\testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class AdminFrontendController extends Controller
{
    public function home_slider()
    {
        $sliders = home_slider::paginate(10);
        return view('admin.frontend.homeSlider',compact('sliders'));
    }

    public function home_slider_save(Request $request)
    {
        $new_slider = new home_slider();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/slider/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->save($imgUrl1);
            $new_slider->image = $imgUrl1;
        }

        $new_slider->title = $request->title;
        $new_slider->sub_title = $request->sub_title;
        $new_slider->save();

        return back()->with('success','Home Slider Successfully Created');

    }


    public function home_slider_update(Request $request)
    {
        $update_slider = home_slider::where('id',$request->slider_edit)->first();
        if($request->hasFile('image')){
            @unlink($update_slider->image);
            $image = $request->file('image');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/slider/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->save($imgUrl1);
            $update_slider->image = $imgUrl1;
        }

        $update_slider->title = $request->title;
        $update_slider->sub_title = $request->sub_title;
        $update_slider->save();

        return back()->with('success','Home Slider Successfully Updated');
    }

    public function home_slider_delete(Request $request)
    {
        $delete_slider = home_slider::where('id',$request->slider_delete)->first();
        @unlink($delete_slider->image);
        $delete_slider->delete();
        return back()->with('success','Home Slider Successfully Deleted');
    }

    public function static_data()
    {
        $static = static_section::first();
        return view('admin.frontend.staticData',compact('static'));
    }


    public function static_data_save(Request $request)
    {
        $static = static_section::first();
        $static->about_us = $request->about_us;
        $static->privacy = $request->privacy;
        $static->shipping_policy = $request->shipping_policy;
        $static->return_policy = $request->return_policy;
        $static->checkout_condition = $request->checkout_condition;
        $static->terms = $request->terms;
        $static->save();

        return back()->with('success','Static Data Successfully Updated');
    }


    public function social_icons()
    {
        $icons = social_icon::all();
        return view('admin.frontend.socialIcons',compact('icons'));
    }

    public function social_icons_save(Request $request)
    {
        $new_icon = new social_icon();
        $new_icon->name = $request->name;
        $new_icon->icon = $request->icon;
        $new_icon->icon_link = $request->icon_link;
        $new_icon->save();

        return back()->with('success','Social Icon Successfully Created');

    }

    public function social_icons_update(Request $request)
    {
        $update_icon = social_icon::where('id',$request->icon_edit)->first();
        $update_icon->name = $request->name;
        $update_icon->icon = $request->icon;
        $update_icon->icon_link = $request->icon_link;
        $update_icon->save();

        return back()->with('success','Social Icon Successfully Updated');
    }

    public function social_icons_delete(Request $request)
    {
        $delete_icon = social_icon::where('id',$request->icon_delete)->first();
        $delete_icon->delete();
        return back()->with('success','Social Icon Successfully Deleted');
    }



    public function news_latter()
    {
        $news_latter = news_latter::orderBy('id','desc')->paginate(15);
        return view('admin.frontend.newsLatter',compact('news_latter'));
    }

    public function news_latter_send(Request $request)
    {
        $news = news_latter::all();
        $message = $request->newsmessage;
        foreach ($news as $nws)
        {

            $to = $nws->email;

            $msg = [
                'text' => $message
            ];
            Mail::to($to)->send(new NewsLatterEmail($msg));

        }



        return back()->with('success','News Latter Successfully Send');



    }



    public function testimonial()
    {
        $tests = testimonial::orderBy('id','desc')->paginate(15);
        return view('admin.frontend.testimonial',compact('tests'));
    }


    public function testimonial_save(Request $request)
    {
        $news_test = new testimonial();
        $news_test->desc = $request->desc;
        $news_test->save();

        return back()->with('success','Testimonial Successfully Created');

    }


    public function testimonial_update(Request $request)
    {
        $update_test = testimonial::where('id',$request->edit_test)->first();
        $update_test->desc = $request->desc;
        $update_test->save();

        return back()->with('success','Testimonial Successfully Updated');
    }


    public function testimonial_delete(Request $request)
    {
        $delete_ts = testimonial::where('id',$request->delete_tes)->first();
        $delete_ts->delete();
        return back()->with('success','Testimonial Successfully Deleted');
    }


    public function advertisement()
    {
        $adds = static_section::first();
        return view('admin.frontend.advertisement',compact('adds'));
    }


    public function advertisement_update(Request $request)
    {
        $adds = static_section::first();
        if($request->hasFile('add_image_one')){
            @unlink($adds->add_image_one);
            $image = $request->file('add_image_one');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/adds/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->resize(445,88)->save($imgUrl1);
            $adds->add_image_one = $imgUrl1;
        }

        if($request->hasFile('add_image_two')){
            @unlink($adds->add_image_two);
            $image = $request->file('add_image_two');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/adds/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->resize(445,300)->save($imgUrl2);
            $adds->add_image_two = $imgUrl2;
        }

        if($request->hasFile('add_image_three')){
            @unlink($adds->add_image_three);
            $image = $request->file('add_image_three');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/adds/';
            $imgUrl3  = $directory.$imageName;
            Image::make($image)->resize(450,185)->save($imgUrl3);
            $adds->add_image_three = $imgUrl3;
        }

        if($request->hasFile('add_image_four')){
            @unlink($adds->add_image_four);
            $image = $request->file('add_image_four');
            $imageName = uniqid().'.'."jpg";
            $directory = 'assets/admin/images/adds/';
            $imgUrl4  = $directory.$imageName;
            Image::make($image)->resize(450,185)->save($imgUrl4);
            $adds->add_image_four = $imgUrl4;
        }


        $adds->add_one_link = $request->add_one_link;
        $adds->add_one_status = $request->add_one_status;
        $adds->add_two_link = $request->add_two_link;
        $adds->add_two_status = $request->add_two_status;
        $adds->add_three_link = $request->add_three_link;
        $adds->add_three_status = $request->add_three_status;
        $adds->add_four_link = $request->add_four_link;
        $adds->add_four_status = $request->add_four_status;
        $adds->save();

        return back()->with('success','Advertisement Successfully Updated');


    }


    public function notification()
    {
        $noti = static_section::first();
        return view('admin.frontend.notification',compact('noti'));
    }

    public function notification_update(Request $request)
    {
        $noti_update = static_section::first();
        $noti_update->header_not = $request->header_not;
        $noti_update->header_not_status = $request->header_not_status;
        $noti_update->body_not = $request->body_not;
        $noti_update->body_not_status = $request->body_not_status;
        $noti_update->save();

        return back()->with('success','Notification Successfully Updated');

    }

    public function contact_us()
    {
        $contact_us = contact_us_data::orderBy('id','desc')->paginate(10);
        return view('admin.frontend.contactUs',compact('contact_us'));
    }


    public function contact_us_send(Request $request)
    {
        $contact = contact_us_data::where('id',$request->contact_id)->first();
        $contact->status = 2;
        $contact->save();

        $message = $request->message;
        $to = $contact->email;

        $msg = [
            'text' => $message,
            'name' => $contact->name,
        ];
        Mail::to($to)->send(new ContactEmail($msg));

        return back()->with('success','Message Successfully Send');


    }



}
