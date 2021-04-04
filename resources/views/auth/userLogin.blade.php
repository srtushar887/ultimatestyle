@extends('layouts.frontend')
@section('css')
    <style>
        .login-btn {
            width: 100%;
        }

        .login-text {
            margin-top: 15px;
        }

        .sign-in {
            margin-bottom: 20px;
        }

        .new-login p {
            line-height: 2;
            font-size: 12px;
            color: #767676;
            font-weight: 400;
            z-index: 2;
            position: relative;
            display: inline-block;
            background-color: #fff;
            padding: 0 8px 0 7px;
        }

        .new-login {
            text-align: center;
            position: relative;
            top: 2px;
            padding-top: 7px;

            line-height: 0;


        }

        .new-login::after {
            content: "";
            width: 100%;
            background-color: transparent;
            display: block;
            height: 1px;
            border-top: 1px solid #e7e7e7;
            position: absolute;
            top: 50%;
            margin-top: -1px;
            z-index: 1;
        }

    </style>
@endsection

@section('search')
    <div class="col-md-3 search-area">
        <form class="navbar-form navbar-left" role="search" action="{{route('product.search')}}" method="get">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control search-top searchdara" placeholder="Search Product" name="search" >
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
    </div>
@endsection
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
            <div class="sign-in-page ">
                <div class="row ">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 sign-in">
                        <h2 class="">Sign In</h2>
                        <p class="">Hello, Welcome to your account.</p>

                        <form class="register-form outer-top-xs" role="form" action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address/Phone number <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input  @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="exampleInputEmail1">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary login-btn btn-block">Login</button>
                            <div class="login-text">
                                <p>By continuing, you agree to Ultimate Style's <a href="terms-conditions.html">Conditions of Use </a>
                                    and Privacy
                                    Notice.</p>
                            </div>
                            <div class="outer-xs">

                                <a href="{{route('forgot.password')}}" class="forgot-password pull-left">Forgot your Password?</a>
                            </div>

                        </form>

                    </div>

                    <!-- Sign-in -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ">
                        <div class="new-login">
                            <p>New To Ultimate Style?</p>
                        </div>
                        <a href="{{route('register')}}">

                            <button type="submit" class="btn-upper btn btn-primary login-btn btn-block">Create Your new account</button>
                        </a>
                    </div>
                </div>
            </div><!-- /.sigin-in-->


        </div><!-- /.container -->
    </div>

@stop
