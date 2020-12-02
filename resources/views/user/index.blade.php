@extends('layouts.user')
@section('user')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Pending Orders</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$pending_order}}
                            </h2>
                        </div>
                    </div>

                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Approved Order</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$approved_order}}
                            </h2>
                        </div>
                    </div>

                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Delivered Order</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$delivered_order}}
                            </h2>
                        </div>
                    </div>

                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Rejected Order</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$rejected_order}}
                            </h2>
                        </div>
                    </div>

                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->


    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Orders</h4>

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
                                    <td>${{$order->total_amount}}</td>
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
                                        <a href="{{route('user.myorder.view',$order->id)}}">

                                            <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> </button>

                                        </a>

                                        <a href="{{route('user.myorder.print',$order->id)}}"><button class="btn btn-success btn-sm"><i class="fas fa-print"></i> </button></a>

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
