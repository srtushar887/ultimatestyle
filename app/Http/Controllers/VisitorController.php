<?php

namespace App\Http\Controllers;

use App\general_setting;
use App\Mail\ResetPasswordEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VisitorController extends Controller
{
    public function forgot_password()
    {
        return view('auth.user.userForgotPassword');
    }

    public function forgot_password_submit(Request $request)
    {
        $this->validate($request,[
            'email' => 'required'
        ]);

        $email = $request->email;
        $user = User::where('email',$email)->first();
        if ($user){

            $code = $user->id.rand(000000,999999);
            $user->ver_code = $code;
            $user->save();
            $re_url = route('forgot.password.verify',$code);
            $to = $user->email;
            $subject = "Forgot Password";
            $gen = general_setting::first();
            $form =$gen->site_email;


            $to = $user->email;

            $msg = [
                'text' => $code,
                'name' => $user->name
            ];
            Mail::to($to)->send(new ResetPasswordEmail($msg));



            return back()->with('success_f_mess','We have send a email to your email. please check your email and reset your password');

        }else{
            return back()->with('alert_f_mess','Email Not Found');
        }


    }


    public function forgot_password_verify($code)
    {

        if ($code){

            $user = User::where('ver_code',$code)->first();
            return view('auth.user.userPasswordResend',compact('user'));



        }else{
            return redirect(route('login'))->with('alert','Link Is not active');
        }

    }


    public function forgot_password_reset_save(Request $request)
    {
        $this->validate($request,[
            'new_pass' => 'required',
            'con_pass' => 'required',
        ]);


        if ($request->new_pass != $request->con_pass){
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::where('ver_code',$request->code)->first();
            $user->password = Hash::make($request->new_pass);
            $user->save();

            return redirect(route('login'))->with('success','Password Successfully Changed');

        }


    }
}
