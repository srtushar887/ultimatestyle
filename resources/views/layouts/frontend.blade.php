<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>{{$gn->site_name}}</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link rel="stylesheet" href="{{asset('assets/front/')}}/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('assets/front/')}}/smartmenus-1.1.1/addons/bootstrap/jquery.smartmenus.bootstrap.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/main.css">
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/blue.css">
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/owl.transitions.css">
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/rateit.css">
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/vendor/responsive.css">
    <link rel="stylesheet" href="{{asset('assets/front/')}}/css/vendor/bug-fixing.css">


    <style>
        .top-social {
            margin-top: 11px;
        }

        .top-social a{
            color: #fff;
        }

        .checked {
            color: orange;
        }

    </style>


    @yield('css')

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

</head>

<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top" style="background-color: {{$gn->top_header_background_color}}">
        <div class="container">
            <div class="row" >
                <div class="col-md-4 col-sm-4 col-xs-12" >
                    <div class="left">
                        <ul>
                            <li style="color: white"><i class="fa fa-phone" style="color: white"></i> Hotline:{{$gn->site_phone}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 single-top-item text-center" style="color: white">
                    <h5>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h5>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="right">
                        <div class="top-social">
                            <a href="mailto:name@email.com"><i class="fas fa-envelope"></i> {{$gn->site_email}}</a>
                            <span style="color: #eee; margin-left: 5px;">|</span>
                            <?php
                            $food_iocns = \App\social_icon::all();
                            ?>
                            @foreach($food_iocns as $ic)
                            <a href="{{$ic->icon_link}}" target="_blank"><i class="{{$ic->icon}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <!-- marquee section start -->
    <?php
    $st_data = \App\static_section::first();

    ?>
    @if ($st_data->header_not_status == 1)
    <section class="marquee-sec">
        <div class="container">
            <div>
                <marquee class="marquee-sec-inner" style="margin-top: -5px;" scrolldelay="250">
                    <p>{!! $st_data->header_not !!}</p>
                </marquee>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </section>
    @endif

    <!-- marquee section end -->
    <!-- Header top Start -->


    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo">
                    <a href="{{route('front')}}"><img src="{{asset('assets/front/')}}/images/logo.png" alt="logo image"></a>
                </div>

                <div class="col-md-5 right">
                    <ul>
                        @guest

                            <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
                        @else
                            <li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
                                {{Auth::user()->name}}<span
                                        class="caret"></span></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('home')}}"><i class="fas fa-users-cog"></i>Dashboard</a></li>
                                    <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                            <?php
                            $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                            $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                            $sub = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                            ?>

                        <li><a href="{{route('view.cart')}}"><i class="fa fa-shopping-cart"></i> View Cart ({{$gn->site_currency}}.{{$sub}})</a></li>
                    </ul>
                </div>
                @yield('search')
            </div>
        </div>
    </div>
    <!-- Header top END -->
    <!-- /.main-header -->

    <!-- ============================================== NAVheader============================================ -->
    <!-- Navbar fixed top -->
    <section>
        <div class="navbar navbar-default" id="mNavbar" role="navigation">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="navbar-toggler-icon"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse">

                            <!-- Left nav -->
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('front')}}">Home</a></li>
                                <?php
                                $main_cats = \App\top_level_category::all();
                                ?>

                                @foreach($main_cats as $mcats)
                                    <li><a href="{{route('main.category.products',$mcats->id)}}">{{$mcats->top_cat_name}} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            $mid_cats = \App\mid_level_category::where('top_cat_id',$mcats->id)->get();
                                            ?>
                                            @foreach($mid_cats as $mcats)
                                                <li><a href="{{route('mid.category.products',$mcats->id)}}">{{$mcats->mid_cat_name}} <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        $end_cats = \App\end_level_category::where('mid_cat_id',$mcats->id)->get();
                                                        ?>
                                                        @foreach($end_cats as $endcat)
                                                            <li><a href="{{route('end.category.products',$endcat->id)}}">{{$endcat->end_cat_name    }}</a></li>
                                                        @endforeach

                                                    </ul>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>


                    <!--/.nav-collapse -->
                </div>
            </div>
            <!--/.container -->
        </div>

    </section>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->
</header>

<!-- ============================================== HEADER : END ============================================== -->
@yield('front')
<!-- Footer Start -->
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
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>www.ultimatestyle.com.bd</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{$gn->site_phone}}
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
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
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">USEFUL LINK
                        </h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{route('front')}}">Home</a></li>
                            <li><a  href="{{route('about.us')}}">About</a></li>
                            <li class="last"><a  href="{{route('blogs')}}">Blog</a></li>
                            <li><a  href="{{route('contact.us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">OUR CONDITIONS

                        </h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{route('shipping.policy')}}" title="About us">Shipping Policy</a></li>
                            <li><a href="{{route('return.policy')}}">Return policy</a></li>
                            <li><a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
                            <li><a href="{{route('terms.condition')}}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-6 col-sm-6 text-center single-copyright-item">
                <div class="footer-copyright">
                    <?php
                        $date = \Carbon\Carbon::now()->format('Y');
                    ?>
                    <p style="color: #aaa; margin-top: 60px;">Copyright @ 2018-{{$date}} <span
                            style="color: #e40046; font-weight: 600;">ultimatestyle.com.bd</span>. All Rights Reserved</p>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 text-center single-copyright-item">
                <div class="footer-copyright">
                    <img style="width:300px;height:auto;" src="https://securepay.sslcommerz.com/public/image/SSLCommerz-Pay-With-logo-All-Size-05.png" />
                </div>
            </div>

        </div>
    </div>

</footer>
<!-- ============================================================= FOOTER : END============================================================= -->



<!-- JavaScripts placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/front')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets/front')}}/js/bootstrap-hover-dropdown.min.js"></script>
<script src="{{asset('assets/front')}}/smartmenus-1.1.1/jquery.smartmenus.js"></script>
<script src="{{asset('assets/front')}}/smartmenus-1.1.1/addons/bootstrap/jquery.smartmenus.bootstrap.js"></script>
<script src="{{asset('assets/front')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('assets/front')}}/js/echo.min.js"></script>
<script src="{{asset('assets/front')}}/js/jquery.easing-1.3.min.js"></script>
<script src="{{asset('assets/front')}}/js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="{{asset('assets/front')}}/js/lightbox.min.js"></script>
<script src="{{asset('assets/front')}}/js/bootstrap-select.min.js"></script>
<script src="{{asset('assets/front')}}/js/wow.min.js"></script>
<script src="{{asset('assets/front')}}/js/scripts.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/35aac4d297.js" crossorigin="anonymous"></script>
<!-- Font Awesome -->

@yield('js')


<script src="https://kit.fontawesome.com/35aac4d297.js" crossorigin="anonymous"></script>


</body>

</html>
