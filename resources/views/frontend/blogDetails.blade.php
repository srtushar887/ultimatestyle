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
@section('front')


    <div class="body-content">
        <div class="container" style="width: 100%">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="{{asset($blogs->blog_image)}}" style="height: 400px;width: 100%" alt="">
                            <h1>{!! $blogs->blog_title !!}</h1>
                            <span class="author">Admin</span>
                            <?php
                            $blog_comment_count = \App\blog_comment::where('blog_id',$blogs->id)->count();
                            ?>
                            <span class="review">
                                @if ($blog_comment_count <= 1)
                                    {{$blog_comment_count}} Comment
                                @else
                                    {{$blog_comment_count}} Comments
                                @endif

                            </span>
                            <?php

                            $date = \Carbon\Carbon::now();
                            $times = strtotime($blogs->created_at)
                            ?>
                            <span class="date-time">{{date('F j, Y, g:i a',$times )}}</span>
                            <p>{!! $blogs->blog_des !!}</p>
                        </div>
                        <div class="blog-post-author-details wow fadeInUp">
                            <div class="row">
                                @foreach($blog_comments as $bcom)
                                    <div class="col-md-12">
                                        <h4>{{$bcom->name}}</h4>
                                        <?php

                                        $date = \Carbon\Carbon::now();
                                        $times = strtotime($bcom->created_at)
                                        ?>
                                        <span class="author-job">{{date('F j, Y, g:i a',$times )}}</span>
                                        <p>{!! $bcom->comment !!}</p>

                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <form action="{{route('blog.comment.save')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Leave A Comment</h4>
                                    </div>
                                    @include('layouts.error')
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                            <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                            <input type="hidden" name="blog_id" value="{{$blogs->id}}" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                            <textarea class="form-control unicase-form-control" name="comment" id="exampleInputComments" ></textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-12 outer-bottom-small m-t-20">
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 sidebar">
                        <div class="sidebar-module-container">
                            <div class="search-area outer-bottom-small">
                                <form action="{{route('search.blog')}}" method="get">
                                    @csrf
                                    <div class="control-group">
                                        <input placeholder="Type to search" name="search"  class="search-field">
                                        <a href="#" class="search-button"></a>
                                    </div>
                                </form>
                            </div>
                            @if ($static_data->add_two_status == 1)
                                <a href="{{$static_data->add_two_link}}" target="_blank">
                                    <div class="home-banner outer-top-n outer-bottom-xs">
                                        <img src="{{asset($static_data->add_image_two)}}" alt="Image">
                                    </div>
                                </a>
                        @endif
                            <!-- ==============================================CATEGORY============================================== -->
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title">Category</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="accordion">
                                        @foreach($blog_categories as $bcts)
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a href="{{route('blog.category.view',$bcts->id)}}"  class="accordion-toggle collapsed">
                                                        {{$bcts->category_name}}
                                                    </a>
                                                </div>
                                                <!-- /.accordion-heading -->
                                                <!-- /.accordion-body -->
                                            </div>
                                        @endforeach

                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
