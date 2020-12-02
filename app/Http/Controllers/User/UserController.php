<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\user_order;
use App\user_order_detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function checkout()
    {
        return view('user.checkout');
    }

    public function payment_confirm(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->phone_number = $request->phone;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->postal_code = $request->postal_code;
        $user->zip_code = $request->zip_code;
        $user->save();

        $user_order = new user_order();
        $user_order->user_id = $user->id;
        $user_order->user_order_id = $user->id . rand(0000000000, 9999999999);
        $user_order->total_amount = $request->total_amount;
        $user_order->payment_type = $request->payment_type;
        $user_order->payment_address = $request->payment_address;
        $user_order->status = 1;

        if ($user_order->save()) {
            $cards = Cart::content();
            foreach ($cards as $card) {
                $order_detais = new user_order_detail();
                $order_detais->order_id = $user_order->id;
                $order_detais->product_id = $card->id;
                $order_detais->price = $card->price;
                $order_detais->qty = $card->qty;
                $order_detais->color_id = $card->options->color;
                $order_detais->size_id = $card->options->size;
                $order_detais->min_del_day = $card->options->dmimday;
                $order_detais->max_del_day = $card->options->dmaxday;
                $order_detais->save();
            }

        }

//        Cart::destroy();

        return redirect(route('my.orders'))->with('success','Order Successfully Placed');
//        return redirect(route('front'))->with('success','Order Added Successfully');

    }

    public function my_orders()
    {
        $orders = user_order::where('user_id',Auth::user()->id)->paginate(15);
        return view('user.myOrder',compact('orders'));
    }

    public function my_order_view($id)
    {
        $order = user_order::where('id',$id)->first();
        return view('user.myOrderView',compact('order'));
    }

    public function my_order_print($id)
    {
        $order = user_order::where('id',$id)->first();
        return view('user.myOrderPrint',compact('order'));
    }


    public function profile()
    {
        return view('user.pages.profile');
    }

    public function profile_update(Request $request)
    {
        $user_profile = User::where('id',Auth::user()->id)->first();
        if($request->hasFile('profile_image')){
            @unlink($user_profile->profile_image);
            $image = $request->file('profile_image');
            $imageName = uniqid().'.'."png";
            $directory = 'assets/admin/images/users/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $user_profile->profile_image = $imgUrl;
        }


        $user_profile->name = $request->name;
        $user_profile->phone_number = $request->phone_number;
        $user_profile->country = $request->country;
        $user_profile->address = $request->address;
        $user_profile->city = $request->city;
        $user_profile->state = $request->state;
        $user_profile->postal_code = $request->postal_code;
        $user_profile->zip_code = $request->zip_code;
        $user_profile->save();

        return back()->with('success','Profile Successfully Updated');


    }


    public function change_password()
    {
        return view('user.pages.changePassword');
    }

    public function change_password_save(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;

        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $admin_pass = User::where('id',Auth::user()->id)->first();
            $admin_pass->password = Hash::make($npass);
            $admin_pass->save();

            return  back()->with('success','Password Successfully Changed');

        }


    }
}
