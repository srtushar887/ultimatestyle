<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\user_order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function pending_orders()
    {
        $orders = user_order::where('status',1)->orderBy('id','desc')->paginate(15);
        return view('admin.order.pendingOrders',compact('orders'));
    }

    public function approved_order()
    {
        $orders = user_order::where('status',2)->orderBy('id','desc')->paginate(15);
        return view('admin.order.approvedOrders',compact('orders'));
    }

    public function delivered_order()
    {
        $orders = user_order::where('status',3)->orderBy('id','desc')->paginate(15);
        return view('admin.order.deliveredOrders',compact('orders'));
    }

    public function rejected_order()
    {
        $orders = user_order::where('status',4)->orderBy('id','desc')->paginate(15);
        return view('admin.order.rejectedOrders',compact('orders'));
    }





    public function order_details($id)
    {
        $order = user_order::where('id',$id)->first();
        return view('admin.order.orderDetails',compact('order'));
    }


    public function order_print($id)
    {
        $order = user_order::where('id',$id)->first();
        return view('admin.order.orderPrint',compact('order'));
    }


    public function order_status_save(Request $request)
    {
        $status = $request->status;

        if ($status == 1)
        {
            $order = user_order::where('id',$request->order_update_id)->first();
            $order->status = $request->status;
            $order->save();

            return back()->with('success','Order Pending');

        }elseif ($status == 2){
            $order = user_order::where('id',$request->order_update_id)->first();
            $order->status = $request->status;
            $order->save();

            return back()->with('success','Order Approved');
        }elseif ($status == 3){
            $order = user_order::where('id',$request->order_update_id)->first();
            $order->status = $request->status;
            $order->save();

            return back()->with('success','Order Delivered');
        }elseif ($status == 4){
            $order = user_order::where('id',$request->order_update_id)->first();
            $order->status = $request->status;
            $order->save();

            return back()->with('success','Order Rejected');
        }else{
            return back()->with('alert','Order Status Not Selected');
        }

    }
}
