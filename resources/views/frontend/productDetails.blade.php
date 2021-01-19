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

@stop

@section('front')

    <div class="body-content outer-top-xs">
        <div class='container' style="width: 100%">
            <div class='row single-product'>

                <!-- /.sidebar -->
                <div class='col-md-12'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->main_image)}}">
                                                <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->main_image)}}" style="height: 350px;"/>
                                            </a>
                                        </div>
                                        <!-- /.single-product-gallery-item -->
                                        @if (!empty($product->image_one) && file_exists($product->image_one))
                                            <div class="single-product-gallery-item" id="slide2">
                                                <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->image_one)}}">
                                                    <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_one)}}" style="height: 350px;"/>
                                                </a>
                                            </div>
                                        @endif

                                        @if(!empty($product->image_two) && file_exists($product->image_two))
                                        <!-- /.single-product-gallery-item -->
                                            <div class="single-product-gallery-item" id="slide3">
                                                <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->image_two)}}">
                                                    <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_two)}}" style="height: 350px;" />
                                                </a>
                                            </div>
                                        @endif

                                        @if (!empty($product->image_three) && file_exists($product->image_three))
                                        <!-- /.single-product-gallery-item -->
                                            <div class="single-product-gallery-item" id="slide4">
                                                <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->image_three)}}">
                                                    <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_three)}}" style="height: 350px;"/>
                                                </a>
                                            </div>
                                        @endif

                                        @if (!empty($product->image_four) && file_exists($product->image_four))
                                        <!-- /.single-product-gallery-item -->
                                            <div class="single-product-gallery-item" id="slide5">
                                                <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->image_four)}}">
                                                    <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_four)}}" style="height: 350px;"/>
                                                </a>
                                            </div>
                                        @endif

                                        @if (!empty($product->image_five) && file_exists($product->image_five))
                                        <!-- /.single-product-gallery-item -->
                                            <div class="single-product-gallery-item" id="slide6">
                                                <a data-lightbox="image-1" data-title="Gallery" href="{{asset($product->image_five)}}">
                                                    <img class="img-responsive" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_five)}}" style="height: 350px;"/>
                                                </a>
                                            </div>
                                        @endif

                                    </div>
                                    <!-- /.single-product-slider -->
                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            @if (!empty($product->main_image) && file_exists($product->main_image))
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                        <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->main_image)}}" style="height: 50px;"/>
                                                    </a>
                                                </div>
                                            @endif

                                            @if (!empty($product->image_one) && file_exists($product->image_one))
                                                <div class="item">
                                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                                        <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_one)}}" style="height: 50px;"/>
                                                    </a>
                                                </div>
                                            @endif

                                            @if (!empty($product->image_two) && file_exists($product->image_two))
                                                <div class="item">
                                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                                                        <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_two)}}" style="height: 50px;"/>
                                                    </a>
                                                </div>
                                            @endif

                                            @if (!empty($product->image_three) && file_exists($product->image_three))
                                                <div class="item">
                                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4">
                                                        <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_three)}}" style="height: 50px;"/>
                                                    </a>
                                                </div>
                                            @endif

                                            @if (!empty($product->image_four) && file_exists($product->image_four))
                                                <div class="item">
                                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="5" href="#slide5">
                                                        <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_four)}}" style="height: 50px;"/>
                                                    </a>
                                                </div>
                                            @endif
                                            @if (!empty($product->image_five) && file_exists($product->image_five))
                                                <div class="item">
                                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="6" href="#slide6">
                                                        <img class="img-responsive" width="85" alt="" src="{{asset('assets/frontend/')}}/images/blank.gif" data-echo="{{asset($product->image_five)}}" style="height: 50px;"/>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- /#owl-single-product-thumbnails -->
                                    </div>
                                    <!-- /.gallery-thumbs -->
                                </div>
                                <!-- /.single-product-gallery -->
                            </div>
                            <!-- /.gallery-holder -->

                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{$product->product_name}}</h1>
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <?php

                                                $rating = \App\product_review::where('product_review_id',$product->id)->sum('quality');
                                                $rating_count = \App\product_review::where('product_review_id',$product->id)->count();
                                                $rat = ($rating * 5  ) /100;
                                                ?>
                                                @if ($rating_count > 0)
                                                    @for ($i = 0; $i < $rat; $i++)
                                                        <span class="fa fa-star checked" style="color: orange"></span>
                                                    @endfor
                                                @else
                                                    No Review
                                                @endif
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <?php

                                                    $product_review = \App\product_review::where('product_review_id',$product->id)->count();
                                                    ?>
                                                    @if ($product_review <= 1)
                                                        <a href="#" class="lnk">({{$product_review}} Review)</a>
                                                    @else
                                                        <a href="#" class="lnk">({{$product_review}} Reviews)</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.rating-reviews -->
                                    @if (!empty($product->min_del_date) && !empty($product->max_del_date) )


                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Delivery Time :  </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9" style="margin-left: 10px">
                                                <div class="stock-box">
                                                    <span class="value"> {{$product->min_del_date}} - {{$product->max_del_date}} Days</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                @endif
                                    <!-- /.stock-container -->
                                    <div class="description-container m-t-20">
                                        {!! $product->sort_des !!}
                                    </div>

                                    <form action="{{route('add.to.cart.single')}}" method="post">
                                        @csrf
                                        <div class="stock-container info-container m-t-10">
                                            <div class="row">

                                                <?php
                                                $color_count = \App\product_color::where('product_id',$product->id)->count();
                                                $size_count = \App\product_size::where('product_id',$product->id)->count();
                                                ?>
                                                @if ($color_count > 0)
                                                    <div class="col-sm-6">
                                                        <div class="stock-box">
                                                            <label>Color</label>
                                                            <select class="form-control" name="color">
                                                                @foreach($colors as $procolor)
                                                                    <?php
                                                                    $color = \App\color::where('id',$procolor->id)->first();
                                                                    ?>
                                                                    @if ($color)
                                                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                                    @endif

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($size_count > 0)
                                                    <div class="col-sm-6">
                                                        <div class="stock-box">
                                                            <label>Size</label>
                                                            <select class="form-control" name="size">
                                                                @foreach($sizes as $prosize)
                                                                    <?php
                                                                    $size = \App\size::where('id',$prosize->id)->first();
                                                                    ?>
                                                                    @if ($size)
                                                                        <option value="{{$size->id}}">{{$size->size_name}}</option>
                                                                    @endif

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                            <!-- /.row -->
                                        </div>

                                        <!-- /.description-container -->
                                        <div class="price-container info-container m-t-20">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="price-box">
                                                        <span class="price">{{$gn->site_currency}}.{{$product->current_price}}</span>
                                                        @if (!empty($product->old_price))
                                                            <span class="price-strike">{{$gn->site_currency}}.{{$product->old_price}}</span>
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.price-container -->
                                        <div class="quantity-container info-container">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <span class="label">Qty :</span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="cart-quantity">
                                                        <div class="quant-input">
                                                            <div class="arrows">
                                                                <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                                <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                            </div>
                                                            <input type="text" name="quantity" value="1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                                <div class="col-sm-7">
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                    </form>
                                    <!-- /.quantity-container -->
                                </div>
                                <!-- /.product-info -->
                            </div>

                            <!-- /.col-sm-7 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>

                                </ul>
                                <!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">
                                <div class="tab-content">
                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">{!! $product->description !!}</p>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>
                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                    </div>
                                                </div>
                                                <!-- /.reviews -->
                                            </div>
                                            <!-- /.product-reviews -->
                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <form action="{{route('product.review.save')}}" method="post">
                                                    @csrf
                                                    <div class="review-table">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- /.table .table-bordered -->
                                                        </div>
                                                        <!-- /.table-responsive -->
                                                    </div>
                                                    <!-- /.review-table -->
                                                    <div class="review-form">
                                                        <div class="form-container">
                                                            {{--                                                        <form role="form" class="cnt-form">--}}
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" name="name" id="exampleInputName" placeholder="">
                                                                        <input type="hidden" class="form-control" name="product_review_id" value="{{$product->id}}">
                                                                    </div>
                                                                    <!-- /.form-group -->

                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" name="message" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                            </div>
                                                            <!-- /.row -->
                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div>
                                                            <!-- /.action -->
                                                        {{--                                                        </form>--}}
                                                        <!-- /.cnt-form -->
                                                        </div>
                                                        <!-- /.form-container -->
                                                    </div>
                                                </form>
                                                <!-- /.review-form -->
                                            </div>
                                            <!-- /.product-add-review -->
                                        </div>
                                        <!-- /.product-tab -->
                                    </div>
                                    <!-- /.tab-pane -->

                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.product-tabs -->
                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related products</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach($related_product as $relpro)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="{{route('product.details',$relpro->id)}}"><img  src="{{asset($relpro->main_image)}}" style="height: 400px;" alt=""></a>
                                                </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{route('product.details',$relpro->id)}}">{{substr($relpro->product_name,0,30)}}......</a></h3>
                                                <?php

                                                $rating = \App\product_review::where('product_review_id',$relpro->id)->sum('quality');
                                                $rating_count = \App\product_review::where('product_review_id',$relpro->id)->count();
                                                $rat = ($rating * 5  ) /100;
                                                ?>
                                                @if ($rating_count > 0)
                                                    @for ($i = 0; $i < $rat; $i++)
                                                        <span class="fa fa-star checked" style="color: orange"></span>
                                                    @endfor
                                                @else
                                                    No Review
                                                @endif
                                                <div class="description"></div>
                                                <div class="product-price">
                                       <span class="price">
                                       {{$gn->site_currency}}{{$relpro->current_price}}
                                       </span>
                                                    @if (!empty($relpro->old_price))
                                                        <span class="price-before-discount">{{$gn->site_currency}}{{$relpro->old_price}}</span>
                                                    @endif

                                                </div>
                                                <br>
                                                <a href="{{route('product.details',$relpro->id)}}">

                                                    <button class="btn btn-primary btn-block " type="button"><i class="fa fa-eye"></i> View Details</button>
                                                </a>
                                                <!-- /.product-price -->
                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">

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

                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
                </div>
                <!-- /.col -->
                <div class="clearfix"></div>
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">
                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand1.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand2.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand3.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand4.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand5.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand6.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand2.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand4.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand1.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('assets/frontend/')}}/images/brands/brand5.png" src="{{asset('assets/frontend/')}}/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                    </div>
                    <!-- /.owl-carousel #logo-slider -->
                </div>
                <!-- /.logo-slider-inner -->
            </div>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
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



        });

    </script>
@stop
