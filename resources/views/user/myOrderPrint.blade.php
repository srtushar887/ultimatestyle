@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <h4><b>{{$gn->site_name}}</b></h4>
                        </div>
                        <div class="float-right">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-6">
                            <h6 class="font-weight-bold">TO:</h6>
                            <?php
                            $user = \App\User::where('id',$order->user_id)->first();
                            ?>
                            <address class="line-h-24">

                                <b>{{$user->name}}</b><br>
                                {!! $user->address !!}<br>
                                <abbr title="Phone">P:</abbr> {{$user->phone_number}}
                            </address>
                        </div><!-- end col -->
                        <div class="col-6">
                            <div class="mt-3 float-right">
                                <p class="mb-2"><strong>Order Date: </strong> {{$order->created_at}}</p>
                                <p class="mb-2"><strong>Order Status: </strong>
                                    @if ($order->status == 1)
                                        <span class="badge badge-soft-success">Pending</span>
                                    @elseif($order->status == 2)
                                        <span class="badge badge-soft-success">Approved</span>
                                    @elseif($order->status == 3)
                                        <span class="badge badge-soft-success">Delivered</span>
                                    @elseif($order->status == 4)
                                        <span class="badge badge-soft-success">Rejected</span>
                                    @else
                                        <span class="badge badge-soft-success">Approved</span>
                                    @endif

                                </p>
                                <p class="m-b-10"><strong>Order ID: </strong> #{{$order->user_order_id}}</p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $user_order_details = \App\user_order_detail::where('order_id',$order->id)->get();
                                    $i = 1;
                                    ?>
                                    @foreach($user_order_details as $order_details)
                                        <?php
                                        $product = \App\product::where('id',$order_details->product_id)->first();
                                        $color = \App\color::where('id',$order_details->color_id)->first();
                                        $size = \App\size::where('id',$order_details->size_id)->first();
                                        $brand = \App\brand::where('id',$product->brand_id)->first();
                                        ?>
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>
                                                <b>{{$product->product_name}}</b>
                                                <br>
                                                @if ($color)
                                                    Color :  {{$color->color_name}}
                                                @endif
                                                <br>
                                                @if ($size)
                                                    Size :   {{$size->size_name}}
                                                @endif
                                                <br>
                                                @if ($brand)
                                                    Brand :   {{$brand->brand_name}}
                                                @endif

                                            </td>
                                            <td>{{$order_details->qty}}</td>
                                            <td>{{$gn->site_currency}}.{{$product->product_new_price}}</td>
                                            <?php
                                            $total = $product->product_new_price * $order_details->qty;
                                            ?>
                                            <td class="text-right">{{$gn->site_currency}}.{{$total}}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted"></h6>

                                <small>

                                </small>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <p><b>Sub-total:</b> {{$gn->site_currency}}.4120.00</p>
                                <h3>{{$gn->site_currency}}.4635.00 </h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="d-print-none my-4">
                        <div class="text-right">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@stop
