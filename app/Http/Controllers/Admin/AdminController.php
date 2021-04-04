<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\general_setting;
use App\Http\Controllers\Controller;
use App\product;
use App\User;
use App\user_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $orders  = user_order::orderBy('id','desc')
            ->where('status',1)
            ->paginate(5);
        $users = User::orderBy('id','desc')->paginate(5);
        $toat_users = User::count();
        $total_order = user_order::count();
        $products = product::count();
        $total_sell = user_order::sum('total_amount');
        return view('admin.index',compact('orders','users','toat_users','total_order','products','total_sell'));
    }


    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.pages.generalSettings',compact('gen'));
    }


    public function general_settings_update(Request $request)
    {
        $gen = general_setting::first();

        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = uniqid().'.'."png";
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = uniqid().'.'."png";
            $directory = 'assets/admin/images/logo/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->save($imgUrl1);
            $gen->icon = $imgUrl1;
        }


        $gen->site_name = $request->site_name;
        $gen->site_slogan = $request->site_slogan;
        $gen->site_email = $request->site_email;
        $gen->site_phone = $request->site_phone;
        $gen->site_alt_phone = $request->site_alt_phone;
        $gen->site_currency = $request->site_currency;
        $gen->top_header_background_color = $request->top_header_background_color;
        $gen->bottom_header_background_color = $request->bottom_header_background_color;
        $gen->site_address = $request->site_address;
        $gen->save();

        return back()->with('success','General Settings Successfully Updated');





    }


    public function profile()
    {
        return view('admin.pages.profile');
    }

    public function profile_update(Request $request)
    {
        $admin_profile = Admin::where('id',Auth::user()->id)->first();
        if($request->hasFile('profile_image')){
            @unlink($admin_profile->profile_image);
            $image = $request->file('profile_image');
            $imageName = uniqid().'.'."png";
            $directory = 'assets/admin/images/users/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $admin_profile->profile_image = $imgUrl;
        }


        $admin_profile->name = $request->name;
        $admin_profile->email = $request->email;
        $admin_profile->phone_number = $request->phone_number;
        $admin_profile->save();

        return back()->with('success','Profile Successfully Updated');


    }


    public function change_password()
    {
        return view('admin.pages.changePassword');
    }

    public function change_password_save(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;

        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $admin_pass = Admin::where('id',Auth::user()->id)->first();
            $admin_pass->password = Hash::make($npass);
            $admin_pass->save();

            return  back()->with('success','Password Successfully Changed');

        }


    }



}
