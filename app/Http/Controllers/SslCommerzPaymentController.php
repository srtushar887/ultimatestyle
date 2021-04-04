<?php

namespace App\Http\Controllers;

use App\order;
use App\User;
use App\user_order;
use App\user_order_detail;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use Illuminate\Support\Facades\Auth;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('user.payment.easycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.



        $post_data = array();
        $post_data['total_amount'] = $request->total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid().Auth::user()->id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = $request->city;
        $post_data['cus_state'] = $request->state;
        $post_data['cus_postcode'] = $request->postal_code;
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->phone_number;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
//        $update_product = DB::table('orders')
//            ->where('transaction_id', $post_data['tran_id'])
//            ->updateOrInsert([
//                'name' => $post_data['cus_name'],
//                'email' => $post_data['cus_email'],
//                'phone' => $post_data['cus_phone'],
//                'amount' => $post_data['total_amount'],
//                'status' => 'Pending',
//                'address' => $post_data['cus_add1'],
//                'transaction_id' => $post_data['tran_id'],
//                'currency' => $post_data['currency']
//            ]);


        $update_product = new order();
        $update_product->name = $post_data['cus_name'];
        $update_product->email = $post_data['cus_email'];
        $update_product->phone = $post_data['cus_phone'];
        $update_product->amount = $post_data['total_amount'];
        $update_product->status = 'Pending';
        $update_product->address = $post_data['cus_add1'];
        $update_product->transaction_id = $post_data['tran_id'];
        $update_product->currency = $post_data['currency'];
        $update_product->save();


        $user_order = new user_order();
        $user_order->user_id = Auth::user()->id;
        $user_order->user_order_id = Auth::user()->id . rand(0000000000, 9999999999);
        $user_order->transaction_id = $update_product->transaction_id;
        $user_order->total_amount = $request->total_amount;
        $user_order->payment_type = $request->payment_type;
        $user_order->payment_address = $request->payment_address;
        $user_order->status = 1;
        $user_order->save();

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
                $order_detais->coriertype = $card->options->coriertype == null ? null : $card->options->coriertype;
                $order_detais->received_email = $card->options->received_email == null ? null : $card->options->received_email;
                $order_detais->save();
            }

        }


        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request)
    {

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                $order_data = user_order::where('transaction_id',$tran_id)->first();

                $user = User::where('id',$order_data->user_id)->first();
                \auth()->guard('web')->login($user);
                return redirect(route('my.orders'))->with('success','Order Successfully Created');

            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Failed']);
                $order_data = user_order::where('transaction_id',$tran_id)->first();

                $user = User::where('id',$order_data->user_id)->first();
                \auth()->guard('web')->login($user);
                return redirect(route('my.orders'))->with('alert','Sorry! Something went wrong');
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            $order_data = user_order::where('transaction_id',$tran_id)->first();
            $user = User::where('id',$order_data->user_id)->first();
            \auth()->guard('web')->login($user);
            return redirect(route('my.orders'))->with('success','Order Successfully Created');
        } else {
            $order_data = user_order::where('transaction_id',$tran_id)->first();
            $user = User::where('id',$order_data->user_id)->first();
            \auth()->guard('web')->login($user);
            return redirect(route('my.orders'))->with('alert','Sorry! Something went wrong');
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);


            $order_data = user_order::where('transaction_id',$tran_id)->first();
            $order_data->status = 4;
            $order_data->save();

            $user = User::where('id',$order_data->user_id)->first();
            \auth()->guard('web')->login($user);
            return redirect(route('my.orders'))->with('alert','Sorry! Transaction is Falied ');

        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {

            $order_data = user_order::where('transaction_id',$tran_id)->first();
            $user = User::where('id',$order_data->user_id)->first();
            \auth()->guard('web')->login($user);
            return redirect(route('my.orders'))->with('alert','Transaction is already Successful ');

        } else {

            $order_data = user_order::where('transaction_id',$tran_id)->first();
            $user = User::where('id',$order_data->user_id)->first();
            \auth()->guard('web')->login($user);
            return redirect(route('my.orders'))->with('alert','Transaction is Invalid ');
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);

            $order_data = user_order::where('transaction_id',$tran_id)->first();
            $order_data->status = 4;
            $order_data->save();

            $user = User::where('id',$order_data->user_id)->first();
            \auth()->guard('web')->login($user);
            return redirect(route('my.orders'))->with('alert','Sorry! Transaction is Cancel ');


        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {

            $order_data = user_order::where('transaction_id',$tran_id)->first();
            $user = User::where('id',$order_data->user_id)->first();
            \auth()->guard('web')->login($user);
            return redirect(route('my.orders'))->with('alert','Transaction is already Successful ');

        } else {

            $order_data = user_order::where('transaction_id',$tran_id)->first();
            $user = User::where('id',$order_data->user_id)->first();
            \auth()->guard('web')->login($user);
            return redirect(route('my.orders'))->with('alert','Transaction is Invalid');

        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
