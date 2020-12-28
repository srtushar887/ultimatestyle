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
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="left">
                        <ul>
                            <li><i class="fa fa-phone"></i> 123-456-7878</li>
                            <li><i class="fa fa-envelope-o"></i> info@yourwebsite.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 single-top-item text-center">
                    <h5>بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h5>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="right">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <!-- marquee section start -->
    <section class="marquee-sec">
        <div class="container">
            <div>
                <marquee class="marquee-sec-inner">
                    <p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release
                        of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum</p>
                </marquee>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </section>

    <!-- marquee section end -->
    <!-- Header top Start -->


    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo">
                    <a href="home.html"><img src="{{asset('assets/front/')}}/images/logo.png" alt="logo image"></a>
                </div>

                <div class="col-md-5 right">
                    <ul>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> User<span
                                    class="caret"></span></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fas fa-users-cog"></i>Dashboard</a></li>
                                <li><a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                            </ul>
                        </li>

                        <li><a href="sign-in.html"><i class="fa fa-sign-in"></i> Login</a></li>
                        <li><a href="registration.html"><i class="fa fa-user-plus"></i> Register</a></li>

                        <li><a href="shopping-cart.html"><i class="fa fa-shopping-cart"></i> View Cart ($0.00)</a></li>
                    </ul>
                </div>
                <div class="col-md-3 search-area">
                    <form class="navbar-form navbar-left" role="search" action="#" method="get">
                        <input type="hidden" name="_csrf" value="14d78ac71a859f402c51f22e4ba85a6d" />
                        <div class="form-group">
                            <input type="text" class="form-control search-top" placeholder="Search Product" name="search_text">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Header top END -->
    <!-- /.main-header -->

    <!-- ============================================== NAVheader============================================ -->
    <!-- Navbar fixed top -->
    <section>
        <div class="navbar navbar-default" id="mNavbar" role="navigation">
            <!-- <div class="container"> -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only ">Toggle navigation</span>
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

                    $menu_top_cats = \App\top_level_category::all()
                    ?>
                    @foreach($menu_top_cats as $menu_topcat)
                    <li><a href="category.html">{{$menu_topcat->top_cat_name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                                $menu_mid_cats = \App\mid_level_category::where('top_cat_id',$menu_topcat->id)->get();

                            ?>
                            @foreach($menu_mid_cats as $menu_midcat)
                            <li><a href="category.html">{{$menu_midcat->mid_cat_name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $menu_end_cats = \App\end_level_category::where('mid_cat_id',$menu_midcat->id)->get()
                                    ?>
                                    @foreach($menu_end_cats as $menu_endcats)
                                    <li><a href="#">{{$menu_endcats->end_cat_name}}</a></li>
                                        @endforeach

                                </ul>
                            </li>
                                @endforeach

                        </ul>
                    </li>
                    @endforeach
                </ul>

            </div>
            <!--/.nav-collapse -->
            <!-- </div> -->
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
                                    <p>12345678<br>
                                        +(888) 456-7890
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">ultimatestylebd@gmail.com</a></span> </div>
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
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                            <li><a href="#" title="About us">Order History</a></li>
                            <li><a href="#" title="faq">FAQ</a></li>
                            <li><a href="#" title="Popular Searches">Specials</a></li>
                            <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
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
                            <li class="first"><a title="Your Account" href="#">Home</a></li>
                            <li><a title="Information" href="#">About Us</a></li>
                            <li><a title="Addresses" href="#">Products</a></li>
                            <li><a title="Addresses" href="#">page2</a></li>
                            <li class="last"><a title="Orders History" href="#">Contact Us</a></li>
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
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                            <li><a href="#">page1</a></li>
                            <li><a href="#">page2</a></li>
                            <li><a href="#">Page3</a></li>
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
                    <li class="" style="width: 10px;"><a target="_blank" rel="" href="https://www.facebook.com/"
                                                         title="Facebook"><i class="fa fa-facebook"></i> </a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 text-center single-copyright-item">
                <div class="footer-copyright">
                    <p style="color: #aaa; margin-top: 8px;">Copyright @ 2018-2020 <span
                            style="color: #e40046; font-weight: 600;">ultimatestylebd.com</span>. All Rights Reserved</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 no-padding single-copyright-item">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="http://ultimatestyle.com.bd/{{asset('assets/front/')}}/frontend/images/payments/1.png" alt=""></li>
                    </ul>
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>

</footer>
<!-- ============================================================= FOOTER : END============================================================= -->



<!-- JavaScripts placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/front/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets/front/')}}/js/bootstrap-hover-dropdown.min.js"></script>
<script src="{{asset('assets/front/')}}/smartmenus-1.1.1/jquery.smartmenus.js"></script>
<script src="{{asset('assets/front/')}}/smartmenus-1.1.1/addons/bootstrap/jquery.smartmenus.bootstrap.js"></script>
<script src="{{asset('assets/front/')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('assets/front/')}}/js/echo.min.js"></script>
<script src="{{asset('assets/front/')}}/js/jquery.easing-1.3.min.js"></script>
<script src="{{asset('assets/front/')}}/js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="{{asset('assets/front/')}}/js/lightbox.min.js"></script>
<script src="{{asset('assets/front/')}}/js/bootstrap-select.min.js"></script>
<script src="{{asset('assets/front/')}}/js/wow.min.js"></script>
<script src="{{asset('assets/front/')}}/js/scripts.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/35aac4d297.js" crossorigin="anonymous"></script>


</body>

</html>
