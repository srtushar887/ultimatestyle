@extends('layouts.frontend')
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
@section('css')

@endsection
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
                                        <div class="excerpt fadeInDown-2 hidden-xs"> <span></span> </div>
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
{{--                    <div class="info-boxes wow fadeInUp">--}}
{{--                        <div class="info-boxes-inner">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6 col-sm-4 col-lg-4">--}}
{{--                                    <div class="info-box">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-xs-12">--}}
{{--                                                <h4 class="info-box-heading green">money back</h4>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <h6 class="text">30 Days Money Back Guarantee</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- .col -->--}}

{{--                                <div class="hidden-md col-sm-4 col-lg-4">--}}
{{--                                    <div class="info-box">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-xs-12">--}}
{{--                                                <h4 class="info-box-heading green">free shipping</h4>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <h6 class="text">Shipping on orders over $99</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- .col -->--}}

{{--                                <div class="col-md-6 col-sm-4 col-lg-4">--}}
{{--                                    <div class="info-box">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-xs-12">--}}
{{--                                                <h4 class="info-box-heading green">Special Sale</h4>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <h6 class="text">Extra $5 off on all items </h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- .col -->--}}
{{--                            </div>--}}
{{--                            <!-- /.row -->--}}
{{--                        </div>--}}
{{--                        <!-- /.info-boxes-inner -->--}}

{{--                    </div>--}}
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
                                                        <h3 class="name"><a href="{{route('product.details',$lproduct->product_end_cat_id)}}">{{substr($lproduct->product_name,0,30)}}......</a></h3>

                                                        <?php

                                                        $rating = \App\product_review::where('product_review_id',$lproduct->id)->sum('quality');
                                                        $rating_count = \App\product_review::where('product_review_id',$lproduct->id)->count();
                                                        $rat = ($rating * 5  ) /100;
                                                        ?>
                                                        @if ($rating_count > 0)
                                                            @for ($i = 0; $i < $rat; $i++)
                                                                <span class="fa fa-star checked"></span>
                                                            @endfor
                                                        @else
                                                            No Review
                                                        @endif

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
                    @if($static_data->body_not_status == 1)
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


                                            <!-- Carousel Slides / Quotes -->
                                            <div class="carousel-inner">

                                                <!-- Quote 1 -->
                                                <div class="item active">

                                                        <div class="row">

                                                            <div class="col-sm-12">
                                                                <p><strong style="font-size: 15px;">{!! $static_data->body_not !!}</strong></p>
                                                            </div>
                                                        </div>

                                                </div>
                                                <!-- Quote 2 -->

                                                <!-- Quote 3 -->

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
                    @endif
                    <!-- /.section -->
                    <!-- ============================================== NewsLetter End============================================== -->

                    @foreach($top_categories as $tcats)
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">{{$tcats->top_cat_name}}</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a href="{{route('main.category.products',$tcats->id)}}" >View All</a></li>
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
                                                            <?php

                                                            $rating = \App\product_review::where('product_review_id',$cproduct->id)->sum('quality');
                                                            $rating_count = \App\product_review::where('product_review_id',$cproduct->id)->count();
                                                            $rat = ($rating * 5  ) /100;
                                                            ?>
                                                            @if ($rating_count > 0)
                                                                @for ($i = 0; $i < $rat; $i++)
                                                                    <span class="fa fa-star checked"></span>
                                                                @endfor
                                                            @else
                                                                No Review
                                                            @endif
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
                        <h3 class="section-title">blog</h3>
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
                                                    <div class="image"> <a href="{{route('blog.details',$blog->id)}}"><img src="{{asset($blog->blog_image)}}" style="height: 200px;" alt=""></a> </div>
                                                </div>
                                                <!-- /.blog-post-image -->

                                                <div class="blog-post-info text-left">
                                                    <h3 class="name"><a href="{{route('blog.details',$blog->id)}}">{{$blog->blog_title}}</a></h3>
                                                    <span class="info">By Admin &nbsp;|&nbsp; {{date('F j, Y, g:i a',$times )}} </span>
                                                    <p class="text">{!! substr($blog->blog_des,0,300) !!}......</p>
                                                    <a href="{{route('blog.details',$blog->id)}}" class="lnk btn btn-primary">Read more</a> </div>
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
