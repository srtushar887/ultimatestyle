@extends('layouts.frontend')
@section('css')

@section('front')

    <div class="body-content outer-top-vs" id="top-banner-and-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            @foreach($sliders as $slid)
                            <div class="item" style="background-image: url('{{asset($slid->image)}}');">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="slider-header fadeInDown-1">{{$slid->title}}</div>
                                        <div class="big-text fadeInDown-1"> New Collections </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{!! $slid->sub_title !!}</span> </div>
                                        <div class="button-holder fadeInDown-3"> <a href="{{route('all.products')}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                        @endforeach
                            <!-- /.item -->


                            <!-- /.item -->

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

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder">
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">Lastest Products</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"></li>
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
                                                        <div class="image"> <a href="{{route('product.details',$lproduct->id)}}">
                                                                <img src="{{asset($lproduct->main_image)}}" style="height: 300px;" alt="">
                                                            </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{route('product.endategory',$lproduct->product_end_cat_id)}}">{{substr($lproduct->product_name,0,30)}}......</a></h3>
                                                        <div class="rating rateit-small">
                                                            <div class="rating">
                                                                <span class="glyphicon glyphicon-star"></span>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                                <span class="glyphicon glyphicon-star"></span>
                                                            </div>
                                                        </div>
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


                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">

                                                                <li class="lnk wishlist text-center" style="margin: 0 auto;margin-left: 40px;">
                                                                    <a data-toggle="modal" class="text-center" data-target="#product_view"> <i class="fas fa-eye"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
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
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->

                    <!-- ============================================== SCROLL TABS : END ============================================== -->

                    <!-- ============================================== NewsLetter End============================================== -->
                    <section class="section notification featured-product outer-bottom-vs wow fadeInUp">
                        <div class=" notification-outer ">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class='col-md-offset-0 col-md-12 text-center'>
                                        <h2>Notification Header</h2>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-offset-0 col-md-12'>
                                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                            <!-- Bottom Carousel Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#quote-carousel" data-slide-to="1"></li>
                                                <li data-target="#quote-carousel" data-slide-to="2"></li>
                                            </ol>

                                            <!-- Carousel Slides / Quotes -->
                                            <div class="carousel-inner">

                                                <!-- Quote 1 -->
                                                <div class="item active">
                                                    <blockquote>
                                                        <div class="row">

                                                            <div class="col-sm-12">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa reiciendis voluptate
                                                                    obcaecati qui.
                                                                    Sunt, commodi totam, qui sed accusantium eligendi nobis temporibus rem voluptas illum
                                                                    eveniet
                                                                    doloremque maiores ullam iure?</p>
                                                            </div>
                                                        </div>
                                                    </blockquote>
                                                </div>
                                                <!-- Quote 2 -->
                                                <div class="item">
                                                    <blockquote>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa reiciendis voluptate
                                                                    obcaecati qui.
                                                                    Sunt, commodi totam, qui sed accusantium eligendi nobis temporibus rem voluptas illum
                                                                    eveniet
                                                                    doloremque maiores ullam iure?</p>
                                                            </div>
                                                        </div>
                                                    </blockquote>
                                                </div>
                                                <!-- Quote 3 -->
                                                <div class="item">
                                                    <blockquote>
                                                        <div class="row">

                                                            <div class="col-sm-12">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa reiciendis voluptate
                                                                    obcaecati qui.
                                                                    Sunt, commodi totam, qui sed accusantium eligendi nobis temporibus rem voluptas illum
                                                                    eveniet
                                                                    doloremque maiores ullam iure?</p>

                                                            </div>
                                                        </div>
                                                    </blockquote>
                                                </div>
                                            </div>

                                            <!-- Carousel Buttons Next/Prev -->
                                            <!-- <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.blog-slider-container -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== NewsLetter End============================================== -->

                    @foreach($top_categories as $tcats)
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">{{$tcats->top_cat_name}}</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a href="#all" >All</a></li>
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
                                                            <div class="image"> <a href="{{route('product.details',$cproduct->id)}}"><img src="{{asset($cproduct->main_image)}}" style="height: 240px;" alt=""></a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product.details',$cproduct->id)}}">{{substr($cproduct->product_name,0,30)}}......</a></h3>
                                                            <div class="rating rateit-small">
                                                                <div class="rating">
                                                                    <span class="glyphicon glyphicon-star"></span>
                                                                    <span class="glyphicon glyphicon-star"></span>
                                                                    <span class="glyphicon glyphicon-star"></span>
                                                                    <span class="glyphicon glyphicon-star"></span>
                                                                    <span class="glyphicon glyphicon-star"></span>
                                                                </div>
                                                            </div>
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


                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                                                                title="Add Cart"> <i class="fas fa-cart-plus"></i> </button>
                                                                        <!-- <button class="btn btn-primary cart-btn" type="button">Add to Cart</button> -->
                                                                    </li>

                                                                    <li class="lnk wishlist">
                                                                        <a data-toggle="modal" data-target="#product_view"> <i class="fas fa-eye"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
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
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                @endforeach


                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

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


                                <!-- /.item -->

                                <!-- /.item -->
                            </div>
                            <!-- /.owl-carousel -->
                        </div>
                        <!-- /.blog-slider-container -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== BLOG SLIDER : END ============================================== -->

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
            <!-- ============================================== MODAL START============================================== -->
            <!-- Modal start -->
            <div class="modal fade product_view" id="product_view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="#" data-dismiss="modal" class="class pull-right"><span
                                    class="glyphicon glyphicon-remove"></span></a>
                            <h3 class="modal-title">Popular Floral Product</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 product_img">
                                    <img src="{{asset('assets/front/')}}/images/products/p13.jpg" class="img-responsive">
                                </div>
                                <div class="col-md-6 product_content">
                                    <h4>Product Id: <span>51526</span></h4>
                                    <div class="rating">
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        (10 reviews)
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                        the
                                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                        type and
                                        scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.</p>
                                    <h3 class="cost"><span class="glyphicon glyphicon-usd"></span> 75.00 <small class="pre-cost"><span
                                                class="glyphicon glyphicon-usd"></span> 60.00</small></h3>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <select class="form-control" name="select">
                                                <option value="" selected="">Color</option>
                                                <option value="black">Black</option>
                                                <option value="white">White</option>
                                                <option value="gold">Gold</option>
                                                <option value="rose gold">Rose Gold</option>
                                            </select>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <select class="form-control" name="select">
                                                <option value="">Capacity</option>
                                                <option value="">16GB</option>
                                                <option value="">32GB</option>
                                                <option value="">64GB</option>
                                                <option value="">128GB</option>
                                            </select>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-md-4 col-sm-12">
                                            <select class="form-control" name="select">
                                                <option value="" selected="">QTY</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                            </select>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <div class="space-ten"></div>
                                    <div class="btn-ground">
                                        <button type="button" class="btn btn-primary"><span
                                                class="glyphicon glyphicon-shopping-cart"></span>
                                            Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End -->



            <!-- ============================================== MODAL END============================================== -->


        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    <!--Newsletter Start  -->




    <!-- Newsletter End -->

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
