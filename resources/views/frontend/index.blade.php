@extends('layouts.frontend')
@section('css')
<style>
    .dropdown-submenu {
        border-bottom: 1px solid #ccc;
    }
    #mn-wrapper {
        display: table;
        width: 93%;
        position: absolute;
        background-color: #f7f7f7;
    }
    .mn-sidebar {
        display: table-cell;
        position: relative;
        vertical-align: top;
        background: #fff;
        width: 216px;
        z-index: 2;
    }
    #mn-cont {
        display: table-cell;
        vertical-align: top;
        position: relative;
        padding: 0;
    }
    .container {
        margin-right: auto;
    }
    .cnt-mcont {
        background-color: #F6F6F6;
        color: inherit;
        font-size: 13px;
        font-weight: 200;
        line-height: 21px;
        padding: 15px 30px 30px 30px;
        margin-top: 0;
        height: 101vh;
    }
    .mn-sidebar .mn-toggle {
        display: none;
        padding: 10px 0;
        text-align: center;
        cursor: pointer;
    }
    .mn-vnavigation {
        margin: 0 0 0 0;
        padding: 0;
        border: 1px solid #ddd;
    }
    .mn-vnavigation li a {
        display: block;
        padding: 14px 18px 13px 15px;
        color: #000;
        text-decoration: none;
        font-size: 12px;
        white-space: nowrap;
        background: #fff;
        position: relative;
        transition: .2s;
    }
    .mn-vnavigation .dropdown-submenu:hover a, .mn-vnavigation li:hover i {
        color: #e40046;
    }
    
    .mn-vnavigation .dropdown-submenu i {
        position: absolute;
        bottom: 13px;
        right: 10px;
        transition: .2s;
    }
    .dropdown-submenu{
        position: relative;
    }
    .dropdown-submenu li:hover a{
        color: #e40046;
    }
    .dropdown-submenu >
    .dropdown-menu {
        top: 0;
        left: 100%;
        margin-left: -1px;
        margin-top: -0.5px;
        width: 216px;
        background: #272930;
        padding: 0;
        border: none;
    }
    .dropdown-submenu.active li a {
        background: #fff !important;
        color: #000 !important;
    }
    .dropdown-menu{
        position: absolute;
        top: 0px !important;
    }
    .dropdown-submenu:hover >
    .dropdown-menu {
        display: block;
    }
    /*
    .dropdown-submenu > a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        margin-top: 5px;
        margin-right: -10px;
    }
    .dropdown-submenu:hover > a:after {
        border-left-color: #fff;
    }
    */
    .dropdown-submenu.pull-left {
        float: none;
    }
    .dropdown-submenu.pull-left > .dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }
    ul {
        list-style: none;
    }
    ul.dropdown-menu.parent {
        margin-top: -1px;
        width: 250px;
    }
    .bottom-mn {
        bottom:0px;
        position:absolute;
        width:100%;
    }
    
    


    /* Mini Shopping Cart Sidebar */
    .side-shopping-cart{
        border: 1px solid #ddd;
        padding-bottom: 30px;
    }
    .side-shopping-cart h4 {
        background: #333333;
        color: #fff;
        display: block;
        padding: 15px;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 600;
        margin-top: 0;
        margin-bottom: 15px;
    }
    .single-side-shopping-cart{
        position: relative;
        overflow: hidden;
        padding: 20px 10px;
        border-bottom: 1px solid #ddd;
    }
    .single-side-shopping-cart .mini-shopping-single-item-close{
        position: absolute;
        top: 10px;
        right: 5px;
        font-size: 20px;
        opacity: .5;
    }
    .mini-shopping-cart-img img{
        width: 100%;
    }
    .mini-shopping-cart-img {
        width: 22%;
        float: left;
    }
    .mini-shopping-cart-info {
        width: 78%;
        float: right;
        padding-left: 10px;
        padding-right: 30px;
        overflow: hidden;
    }
    .mini-shopping-cart-info h3 {
        margin: 0;
        margin-bottom: 10px;
        font-size: 17px;
        font-weight: 600;
    }
    .mini-shopping-cart-single-countity {
        font-size: 16px;
        width: 40%;
        float: left;
    }
    .mini-shopping-cart-single-price {
        width: 60%;
        float: right;
        font-weight: 600;
        font-size: 16px;
        text-align: right;
    }
    .mini-shopping-cart-info p {
        margin-bottom: 0;
        margin-top: 3px;
        display: inline-block;
        opacity: .6;
    }
    .mini-shopping-cart-viewcheckout-btn {
        text-align: center;
        padding-top: 50px;
    }
    .mini-shopping-cart-viewcheckout-btn a {
        border: 1px solid;
        color: #333;
        padding: 8px 20px;
        margin: 0 5px;
        transition: .1s;
    }
    .mini-shopping-cart-viewcheckout-btn a:hover {
        background: #333;
        color: #fff;
    }
    
   
    
    

</style>
@endsection
@section('front')
    <div class="container" style="width: 100%">
        <div class="row" >
            <div class="col-lg-3 col-xs-12 col-sm-12 col-md-3 sidebar">        <!-- ================================== TOP NAVIGATION ================================== -->
                <div id="mn-wrapper"  >
                    <div class="mn-sidebar">
                        <div class="mn-toggle"><i class="fa fa-bars"></i></div>
                        <div class="mn-navblock" >
                            <ul class="mn-vnavigation" >
                                <p style="background: #333; color: #fff; margin: 0; padding: 15px; font-weight: 700;">CATEGORIES</p>
                                @foreach($top_categories as $htcats)
                                <li class="dropdown-submenu active">
                                    <a tabindex="-1" href="{{route('main.category.products',$htcats->id)}}">{{$htcats->top_cat_name}}</a> <i class="fa fa-angle-right"></i>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $hmid_cats = \App\mid_level_category::where('top_cat_id',$htcats->id)->get();
                                        ?>
                                            @foreach($hmid_cats as $hmcat)
                                        <li class="dropdown-submenu active">
                                            <a href="{{route('mid.category.products',$hmcat->id)}}" style="background-color:#272930 ">{{$hmcat->mid_cat_name}}</a> <i class="fa fa-angle-right"></i>
                                            <ul class="dropdown-menu parent">
                                                <?php
                                                $hendcats = \App\end_level_category::where('mid_cat_id',$hmcat->id)->get();
                                                ?>
                                                    @foreach($hendcats as $hendcat)
                                                <li style=" border-bottom: 1px solid #ccc;"><a href="{{route('end.category.products',$hendcat->id)}}">{{$hendcat->end_cat_name}}</a></li>
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

                </div>
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                @if ($static_data->add_one_status == 1)
                    <a href="{{$static_data->add_one_link}}" target="_blank">
                        <div class="app-img outer-bottom-xs" ><img alt="app" src="{{asset($static_data->add_image_one)}}" /></div>
                    </a>
                @endif

            </div>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm owl-main">
                        @foreach($sliders as $slid)
                            <div class="item" style="background-image: url('{{asset($slid->image)}}');">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="big-text fadeInDown-1"> {{$slid->title}} </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{!! $slid->sub_title !!}</span> </div>
                                        <div class="button-holder fadeInDown-3"> <a href="{{route('all.products')}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
            </div>

        </div>

        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                <!-- ============================================== CART SECTION ============================================== -->
                <br>
                <div class="side-shopping-cart">
                    <h4>Shopping Cart</h4>
                    
                    <div class="single-side-shopping-cart">
                        <i class="far fa-times-circle mini-shopping-single-item-close"></i>
                        <div class="mini-shopping-cart-img">
                            <img src="https://ultimatestylebd.com/public/assets/frontend/images/6-35-1024x1024.jpg" alt=""/>
                        </div>
                        <div class="mini-shopping-cart-info">
                            <h3>Product Name</h3>
                            <div class="mini-shopping-cart-single-countity"><i class="far fa-plus-square"></i> 1 <i class="far fa-minus-square"></i></div>
                            <div class="mini-shopping-cart-single-price">TK.300.00</div>
                            <p>Delivery Time: <span>3-5</span> days</p>
                        </div>
                    </div>
                    
                    <div class="single-side-shopping-cart">
                        <i class="far fa-times-circle mini-shopping-single-item-close"></i>
                        <div class="mini-shopping-cart-img">
                            <img src="https://ultimatestylebd.com/public/assets/frontend/images/2-44-1024x1024.jpg" alt=""/>
                        </div>
                        <div class="mini-shopping-cart-info">
                            <h3>Product Name</h3>
                            <div class="mini-shopping-cart-single-countity"><i class="far fa-plus-square"></i> 1 <i class="far fa-minus-square"></i></div>
                            <div class="mini-shopping-cart-single-price">TK.300.00</div>
                            <p>Delivery Time: <span>3-5</span> days</p>
                        </div>
                    </div>
                    
                    <div class="single-side-shopping-cart">
                        <i class="far fa-times-circle mini-shopping-single-item-close"></i>
                        <div class="mini-shopping-cart-img">
                            <img src="https://ultimatestylebd.com/public/assets/frontend/images/9-26-1024x1024.jpg" alt=""/>
                        </div>
                        <div class="mini-shopping-cart-info">
                            <h3>Product Name</h3>
                            <div class="mini-shopping-cart-single-countity"><i class="far fa-plus-square"></i> 1 <i class="far fa-minus-square"></i></div>
                            <div class="mini-shopping-cart-single-price">TK.300.00</div>
                            <p>Delivery Time: <span>3-5</span> days</p>
                        </div>
                    </div>
                    
                    <div class="mini-shopping-cart-viewcheckout-btn">
                        <a href="#">View Cart</a>
                        <a href="#">Checkout</a>
                    </div>
                </div>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->



                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                @if ($static_data->add_three_status == 1)
                                    <a href="{{$static_data->add_three_link}}" target="_blank">
                                        <div class="image"> <img class="img-responsive" src="{{asset($static_data->add_image_three)}}" style="height: 185px;width: 100%" alt=""> </div>
                                    </a>
                                @endif

                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                @if ($static_data->add_four_status == 1)
                                    <a href="{{$static_data->add_four_link}}" target="_blank">
                                        <div class="image"> <img class="img-responsive" src="{{asset($static_data->add_image_four)}}" style="height: 185px;width: 100%" alt=""> </div>
                                    </a>
                                @endif
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">Latest Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <a href="{{route('all.products')}}" ><li class="active">View All</li></a>
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach($latest_product as $lproduct)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{route('product.details',$lproduct->id)}}"><img  src="{{asset($lproduct->main_image)}}" alt=""></a> </div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{route('product.details',$lproduct->id)}}">{{substr($lproduct->product_name,0,40)}}......</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <span class="price"> {{$gn->site_currency}}.{{$lproduct->current_price}} </span>
                                                        @if (!empty($lproduct->old_price))
                                                            <span class="price-before-discount">{{$gn->site_currency}}.{{$lproduct->old_price}}</span>
                                                        @endif

                                                        <br>
                                                        <a href="{{route('product.details',$lproduct->id)}}">

                                                            <button class="btn btn-primary btn-block " type="button"><i class="fa fa-eye"></i> View Details</button>
                                                        </a>
                                                    </div>
                                                    <!-- /.product-price -->
                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @endforeach
                                    <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                @if ($static_data->body_not_status  == 1)
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip" style="border: 2px solid black;background-color: white">
                                    <h4 style="margin: 0 auto" class="text-center">Notification</h4>
                                    <p>{!! $static_data->body_not !!}
                                    </p>
                                    <!-- /.new-label -->
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div>
                @endif



                @foreach($top_categories as $tcats)
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">{{$tcats->top_cat_name}}</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <a href="{{route('main.category.products',$tcats->id)}}" ><li class="active">View All</li></a>
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    <?php
                                    $cat_products = \App\product::where('product_top_cat_id',$tcats->id)->inRandomOrder()->limit(10)->get()
                                    ?>
                                        @if (count($cat_products) > 0)
                                    @foreach($cat_products as $cproduct)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{route('product.details',$cproduct->id)}}"><img  src="{{asset($cproduct->main_image)}}" alt=""></a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{route('product.details',$cproduct->id)}}">
                                                                {{substr($cproduct->product_name,0,20)}}......

                                                            </a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>
                                                        <div class="product-price">
                                                            <span class="price"> {{$gn->site_currency}}.{{$cproduct->current_price}} </span>
                                                            @if (!empty($cproduct->old_price))
                                                                <span class="price-before-discount">{{$gn->site_currency}}.{{$cproduct->old_price}}</span>
                                                            @endif

                                                            <br>
                                                            <a href="{{route('product.details',$cproduct->id)}}">

                                                                <button class="btn btn-primary btn-block " type="button"><i class="fa fa-eye"></i> View Details</button>
                                                            </a>
                                                        </div>
                                                        <!-- /.product-price -->
                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                @endforeach
                                        @else
                                            <p class=""> No Product Available</p>
                                    @endif
                                <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>

                    </div>
                    <!-- /.tab-content -->
                </div>
            @endforeach
            <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BEST SELLER ============================================== -->

                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            @foreach($latest_blog as $blog)
                                <?php

                                $date = \Carbon\Carbon::now();
                                $times = strtotime($blog->created_at)
                                ?>
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img src="{{asset($blog->blog_image)}}" style="height: 200px;" alt=""></a> </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">{{$blog->blog_title}}</a></h3>
                                            <span class="info">By Admin &nbsp;|&nbsp; {{date('F j, Y, g:i a',$times )}} </span>
                                            <p class="text">{!! substr($blog->blog_des,0,300) !!}......</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                        @endforeach
                        <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand1.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand2.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand3.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand4.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand5.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand6.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand2.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand4.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand1.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand5.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                </div>
                <!-- /.owl-carousel #logo-slider -->
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
@stop

@section('js')
    <script>
        $('.newserror').hide();

        $(document).ready(function (){




            $('#newssub').click(function (e){
                e.preventDefault();
                var em = $('.newsemail').val();

                if (em == ""){
                    $('.newserror').show();
                }else {
                    $('.newserror').hide();

                    $.ajax({
                        type : "POST",
                        url: "{{route('user.newslatter.save')}}",
                        data : {
                            '_token' : "{{csrf_token()}}",
                            'em' : em,

                        },
                        success:function(data){
                            swal("Newsletter Subscribe Successfull", "", "success");
                        }
                    });



                }


            });


            $('.maincaturl').click(function () {
                var id = $(this).data('id');
                var url = "{{url('/')}}"+'/'+'main-category'+'/'+id;
                window.location.href = url;


            });


            $('.midcaturl').click(function () {
                var id = $(this).data('id');
                var url = "{{url('/')}}"+'/'+'middle-category'+'/'+id;
                window.location.href = url;


            });

            $('.endcaturl').click(function () {
                var id = $(this).data('id');
                var url = "{{url('/')}}"+'/'+'end-category'+'/'+id;
                window.location.href = url;


            });




        });

    </script>
@stop
