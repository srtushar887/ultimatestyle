<?php

namespace App\Http\Controllers;

use App\Mail\UserAccountVerifyMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomLoginController extends Controller
{
    public function custom_register(Request $request)
    {
        $this->validate($request,[
           'name'=>'required',
           'email'=>'required',
           'phone_number'=>'required',
           'password'=>'required:min:8',
        ]);

        $exists_email = User::where('email',$request->email)->first();
        if ($exists_email){
            return back()->with('ac_ac_error','Email already exists');
        }elseif ($request->password != $request->password_confirmation){
            return back()->with('ac_ac_error','Password not match');
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->account_status = 1;
            $user->save();

            $code = Str::random(5).$user->id.Str::random(2).rand(1,9).Str::random(2).Str::random(5);
            $user_code = User::where('id',$user->id)->first();
            $user_code->ver_code = $code;
            $user_code->save();

            $url = route('user.account.verify.check',$code);
            $to = $user->email;

            $msg = [
                'name' => $user->name,
                'url' => $url
            ];
            Mail::to($to)->send(new UserAccountVerifyMail($msg));


            return redirect(route('login'))->with('ac_ac_error','Account Create Successfully . Please check your mail');

        }
    }


    public function custom_login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:8',
        ]);

        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('front'));
        }elseif(Auth::guard('web')->attempt(['phone_number'=>$request->email,'password'=>$request->password],$request->remember)){
        return redirect()->intended(route('front'));
        }else{
            return redirect()->back();
        }



    }


}
