@extends('layouts.admin')
@section('admin')
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
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Product</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$products}}
                            </h2>
                        </div>

                    </div>


                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Orders</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$total_order}}
                            </h2>
                        </div>

                    </div>


                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->



        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Users</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                               {{$toat_users}}
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
                    <h4 class="card-title">New Orders</h4>

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



    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Profile Image</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">
                                        @if (!empty($user->profile_image) && file_exists($user->profile_image))
                                            <img class="rounded-circle header-profile-user" src="{{asset($user->profile_image)}}" alt="{{$user->name}}">
                                        @else
                                            <img class="rounded-circle header-profile-user" src="https://images-na.ssl-images-amazon.com/images/I/51e6kpkyuIL._AC_SX466_.jpg" alt="{{Auth::user()->name}}">
                                        @endif
                                    </th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>Otto</td>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>

@stop
