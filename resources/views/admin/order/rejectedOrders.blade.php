@extends('layouts.admin')
@section('admin')
    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order List</h4>


                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Total Amount</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->user_order_id}}</th>
                                    <td>{{$gn->site_currency}}.{{$order->total_amount}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        @if ($order->status == 1)
                                            Pending
                                        @elseif($order->status == 2)
                                            Approved
                                        @elseif($order->status == 3)
                                            Delivered
                                        @elseif($order->status == 4)
                                            Rejected
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.order.view',$order->id)}}">

                                            <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> </button>

                                        </a>

                                        <a href="{{route('admin.order.print',$order->id)}}"><button class="btn btn-success btn-sm"><i class="fas fa-print"></i> </button></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>
@stop
