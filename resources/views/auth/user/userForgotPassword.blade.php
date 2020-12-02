@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('front')}}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in col-lg-offset-3">
                        <h4 class="">Reset Password</h4>
                        @include('layouts.error')
                        @if (Session::has('success_f_mess'))
                            <p class="text-success">{{Session::get('success_f_mess')}}</p>
                        @endif
                        @if (Session::has('alert_f_mess'))
                            <p class="text-success">{{Session::get('alert_f_mess')}}</p>
                        @endif

                        <form class="register-form outer-top-xs" role="form" action="{{route('forgot.password.submit')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>

                        </form>


                    </div>
                    <!-- Sign-in -->
                    <!-- create a new account -->

                    <!-- create a new account -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.sigin-in-->
            <br>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <!-- /.logo-slider-inner -->
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>

@stop
