@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
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
                        <div class="sign-in-logo-img">
                            <img src="http://ultimatestylebd.com/public/assets/frontend/images/5f567c1a91ac2.png" alt=""/>
                        </div>
                        <div class="sign-in-box">
                            <h4 class="">Sign Up</h4>
                        @if (Session::has('ac_ac_error'))
                            <p class="text-success">{{Session::get('ac_ac_error')}}</p>

                        @endif
                        <form class="register-form outer-top-xs" role="form" action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email or mobile phone number <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputEmail1" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleInputEmail1" >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" id="exampleInputPassword1" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Confirm Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" id="exampleInputPassword1" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="sing-in-btn">Sing Up</button>
                            
                            <div class="social-sign-in outer-top-xs text-center">
                                <a href="{{ url('/auth/redirect/facebook') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign Up with Facebook</a>
                                <a href="{{ url('/auth/redirect/google') }}" class="twitter-sign-in"><i class="fa fa-google"></i> Sign Up with Google</a>
                            </div>
                            
                            <p class="con-priv">By continuing, you agree to The Ultimate Style BD's <a href="#">Conditions of Use</a> and <a href="#">Privacy Notice</a></p>
                            
                        </div>

                            <p class="text-center" style="margin: 20px 0;">Don't have an account?</p>
                            {{--<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Register</button>--}}
                            
                            <p class="text-center sing-in-cna"><a href="{{route('register')}}"> Create New Account</a></p>
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
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>

@stop
