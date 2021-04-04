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

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('front')}}">Home</a></li>
                    <?php
                    $endcat_name = \App\end_level_category::where('id',$cat_id)->first();
                    $midd_ct = \App\mid_level_category::where('id',$endcat_name->mid_cat_id)->first();
                    $main_ct = \App\top_level_category::where('id',$midd_ct->top_cat_id)->first();
                    ?>
                    <li class='active'>{{$main_ct->top_cat_name}} / {{$midd_ct->mid_cat_name}} / {{$endcat_name->end_cat_name}}</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>


    <div class="body-content outer-top-xs">
        <div class="container" style="width: 100%">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <!-- ================================== TOP NAVIGATION ================================== -->

                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                <h3 class="section-title">Category</h3>
                                <div class="widget-header">

                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">

                                        @foreach($top_cats as $tctas)
                                            <div class="accordion-group">
                                                <div class="accordion-heading"> <a href="#collapseOne{{$tctas->id}}" data-toggle="collapse" class="accordion-toggle collapsed"> </a> <span><a href="{{route('main.category.products',$tctas->id)}}">{{$tctas->top_cat_name}}</a></span> </div>
                                                <!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapseOne{{$tctas->id}}" style="height: 0px;">
                                                    <div class="accordion-inner">
                                                        <ul>
                                                            <!-- collapse inner -->
                                                            <?php

                                                            $mid_cats = \App\mid_level_category::where('top_cat_id',$tctas->id)->get();
                                                            ?>
                                                            @foreach($mid_cats as $mcats)
                                                                <li>
                                                                    <div class="accordion-heading"> <a href="#collapseinnerTwo{{$mcats->id}}" data-toggle="collapse" class="accordion-toggle collapsed accordion-inner-inner"> </a> <span><a href="{{route('mid.category.products',$mcats->id)}}">{{$mcats->mid_cat_name}}</a></span> </div>
                                                                    <div class="accordion-body collapse" id="collapseinnerTwo{{$mcats->id}}" style="height: 0px;">
                                                                        <div class="accordion-inner">
                                                                            <ul>
                                                                                <?php

                                                                                $end_cats = \App\end_level_category::where('mid_cat_id',$mcats->id)->get();
                                                                                ?>
                                                                                @foreach($end_cats as $endcats)
                                                                                    <li><a href="{{route('end.category.products',$endcats->id)}}">{{$endcats->end_cat_name}}</a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                        @endforeach
                                                        <!-- collapse inner end-->

                                                        </ul>
                                                    </div>
                                                    <!-- /.accordion-inner -->
                                                </div>
                                                <!-- /.accordion-body -->
                                            </div>
                                    @endforeach
                                    <!-- /.accordion-group -->


                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->
                <div class="col-md-9">
                    <!-- ========================================== SECTION – HERO ========================================= -->
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach($products as $pro)
                                            <div class="col-sm-6 col-md-4 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="{{route('product.details',$pro->id)}}"><img src="{{asset($pro->main_image)}}" style="height: 400px;" alt=""></a>
                                                            </div>
                                                            <!-- /.image -->
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product.details',$pro->id)}}">{{substr($pro->product_name,0,30)}}......</a></h3>
                                                            <?php

                                                            $rating = \App\product_review::where('product_review_id',$pro->id)->sum('quality');
                                                            $rating_count = \App\product_review::where('product_review_id',$pro->id)->count();
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
                                                                <span class="price"> {{$gn->site_currency}}.{{$pro->current_price}} </span>
                                                                @if (!empty($pro->old_price))
                                                                    <span class="price-before-discount">{{$gn->site_currency}}.{{$pro->old_price}}</span>
                                                                @endif

                                                                <br>
                                                                <a href="{{route('product.details',$pro->id)}}">

                                                                    <br>
                                                                    <a href="{{route('product.details',$pro->id)}}">

                                                                        <button class="btn btn-primary btn-block " type="button"><i class="fa fa-eye"></i> View Details</button>
                                                                    </a>
                                                                </a>
                                                            </div>

                                                            <!-- /.product-price -->

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
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                        <div class="clearfix filters-container">
                            <div class="text-center">
                            {{$products->links()}}
                            <!-- /.pagination-container -->
                            </div>
                            <!-- /.text-right -->

                        </div>
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->

    </div>

@stop
@section('js')

@stop
