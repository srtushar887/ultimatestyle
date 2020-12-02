<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesground.com/Lotus/V1/HTML/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Aug 2020 12:57:30 GMT -->
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>{{$gn->site_name}}</title>
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/main.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/blue.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.transitions.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/rateit.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="{{asset('assets/frontend/')}}/css/lightbox.css" rel="stylesheet">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/font-awesome.css">
    @yield('css')


<!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1" style="width: 100%">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown" style="background-color: {{$gn->top_header_background_color}}">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 single-top-item">
                    <p style="color:#fff; margin-bottom: 0; padding: 7px 0; font-size: 13px;">{{$gn->site_slogan}}</p>
                </div>
                <div class="col-sm-12 col-md-4 single-top-item text-center">
                    <h5 style="color: #fff;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h5>
                </div>
                <div class="col-sm-12 col-md-4 single-top-item text-right">
                    <div class="top-social">
                        <a href="mailto:name@email.com"><i class="fas fa-envelope"></i> name@email.com</a>
                        <span style="color: #eee; margin-left: 5px;">|</span>
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>

<?php
        $st_data = \App\static_section::first();

    ?>
    @if ($st_data->header_not_status == 1)
        <div class="top-bar animate-dropdown" style="background-color: white;height: 30px;" >
            <div class="container">
                <div class="header-top-inner">
                    <marquee style="margin-top: 5px;">{!! $st_data->header_not !!}</marquee>
                </div>
                <!-- /.header-top-inner -->
            </div>
            <!-- /.container -->
        </div>
    @endif


    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header" style="background-color: {{$gn->bottom_header_background_color}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{route('front')}}"> <img src="{{asset($gn->logo)}}" style="height: 50px;width: 150px;margin-top: -10px;" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= --> </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#" ></a> </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    <?php
                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                    $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                    $sub = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                    ?>
                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="top-cart">  </div>

                                <div class="total-price-basket"> <span class="lbl">{{$counts}} items /</span> <span class="total-price"> <span class="sign">{{$gn->site_currency}}.</span><span class="value">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                @if (count($carts) > 0)

                                    @foreach($carts as $caunt)
                                        <div class="cart-item product-summary">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="image"> <a href="{{route('product.details',$caunt->id)}}"><img src="{{asset($caunt->options->image)}}" alt=""></a> </div>
                                                </div>
                                                <div class="col-xs-7">
                                                    <h3 class="name"><a href="{{route('product.details',$caunt->id)}}">{{$caunt->name}}</a></h3>
                                                    <div class="price">{{$gn->site_currency}}.{{$caunt->subtotal()}}</div>
                                                </div>
                                                <div class="col-xs-1 action"> <a href="{{route('add.to.cart.delete.single',$caunt->rowId)}}"><i class="fa fa-trash"></i></a> </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-center">No Cart Product Available</p>
                            @endif
                            <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>{{$gn->site_currency}}.{{$sub}}</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown" style="width: 100%">
        <div class="" style="width: 100%">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class" style="width: 100%">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="{{ Request::path() == '/' ? 'active' : '' }} dropdown yamm-fw"> <a href="{{route('front')}}">Home</a> </li>
                                <li class="{{ Request::is('all-products') ? 'active' : '' }} dropdown yamm-fw"> <a href="{{route('all.products')}}">All products</a> </li>
                                <li class="{{ Request::is('about-us') ? 'active' : '' }} dropdown yamm-fw"> <a href="{{route('about.us')}}">About Us</a> </li>
                                <li class="{{ Request::is('blogs') ? 'active' : '' }} dropdown yamm-fw"> <a href="{{route('blogs')}}">Blogs</a> </li>
                                <li class="{{ Request::is('contact-us') ? 'active' : '' }} dropdown yamm-fw"> <a href="{{route('contact.us')}}">Contact Us</a> </li>
                                <li><a href="{{route('home')}}">My Account</a></li>
                                <li><a href="{{route('my.cart')}}">View Shopping Cart</a></li>
                                <li><a href="{{route('checkout')}}">Checkout</a></li>
                                @guest
                                    <li><a href="{{route('login')}}">Login</a></li>
                                @else
                                    <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">Logout</a>
        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                                
                                <li class=" dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->
    

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-vs" id="top-banner-and-menu" >
@yield('front')
<!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{$gn->site_address}}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{$gn->site_phone}}<br>
                                        +(888) 456-7890</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">{{$gn->site_email}}</a></span> </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">MY ACCOUNT</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{route('home')}}" title="Contact us">My Account</a></li>
                            <li><a href="{{route('my.orders')}}" title="About us">Order History</a></li>
                            <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">USEFUL LINK</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="{{route('front')}}">Home</a></li>
                            <li class="first"><a title="Your Account" href="{{route('all.products')}}">All Products</a></li>
                            <li><a title="Information" href="{{route('about.us')}}">About Us</a></li>
                            <li><a title="Information" href="{{route('about.us')}}">Blog</a></li>
                            <li><a title="Addresses" href="{{route('contact.us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">OUR CONDITIONS</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{route('privacy.policy')}}" title="About us">Privacy & Policy</a></li>
                            <li><a href="{{route('terms.condition')}}" title="Blog">Terms & Condition</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-3 no-padding social single-copyright-item">
                <ul class="link">
                    <?php
                    $social_icons = \App\social_icon::all();
                    ?>
                    @foreach($social_icons as $icon)
                        <li class="" style="width: 10px;"><a target="_blank" rel="" href="{{$icon->icon_link}}" title="Facebook"><i class="{{$icon->icon}}"></i> </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 text-center single-copyright-item">
                <div class="footer-copyright">
                    <p style="color: #aaa; margin-top: 8px;">Copyright @ 2018-<?php echo date("Y"); ?> <span style="color: #e40046; font-weight: 600;">ultimatestylebd.com</span>. All Rights Reserved</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 no-padding single-copyright-item">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{asset('assets/frontend/')}}/images/payments/1.png" alt=""></li>
                    </ul>
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('assets/frontend/')}}/js/jquery-1.11.1.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap-hover-dropdown.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/echo.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.easing-1.3.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap-slider.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/')}}/js/lightbox.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap-select.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/wow.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/fontawesome.min.js"></script>

@yield('js')



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')

</body>

<!-- Mirrored from themesground.com/Lotus/V1/HTML/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Aug 2020 13:03:00 GMT -->
</html>
