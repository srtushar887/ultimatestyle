<?php

namespace App\Http\Controllers;

use App\user_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_order = user_order::where('user_id',Auth::user()->id)->count();
        $pending_order = user_order::where('user_id',Auth::user()->id)->where('status',1)->count();
        $approved_order = user_order::where('user_id',Auth::user()->id)->where('status',2)->count();
        $delivered_order = user_order::where('user_id',Auth::user()->id)->where('status',3)->count();
        $rejected_order = user_order::where('user_id',Auth::user()->id)->where('status',4)->count();
        $orders = user_order::where('user_id',Auth::user()->id)->paginate(8);
        return view('user.index',compact('total_order','pending_order','approved_order','delivered_order','rejected_order','orders'));
    }
}
