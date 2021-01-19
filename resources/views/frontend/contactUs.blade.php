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
            <div class="contact-page">
                <div class="row">
                    <div class="col-md-12 contact-map outer-bottom-vs">
                        <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=15,%20Perambur%20High%20Rd,%20Perambur,%20Chennai,%20Tamil%20Nadu%20600039,%20India+(afwa)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="600" height="450"  style="border:0"></iframe>
                    </div>
                    <form action="{{route('contactus.save')}}" method="post">
                        @csrf
                        <div class="col-md-9 contact-form">
                            <div class="col-md-12 contact-title">
                                <h4>Contact Form</h4>
                            </div>

                            @include('layouts.error')

                            <div class="col-md-6 ">

                                <div class="form-group">
                                    <label class="info-title" for="">Your Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control  "  >
                                </div>

                            </div>
                            <div class="col-md-6 ">

                                <div class="form-group">
                                    <label class="info-title" for="">Your Email <span>*</span></label>
                                    <input type="text" name="email" class="form-control  "  >
                                </div>

                            </div>
                            <div class="col-md-12 ">

                                <div class="form-group">
                                    <label class="info-title" for="">Subject <span>*</span></label>
                                    <input type="text" name="subject" class="form-control  "  >
                                </div>

                            </div>
                            <div class="col-md-12 ">

                                <div class="form-group">
                                    <label class="info-title" for="">Your Message <span>*</span></label>
                                    <textarea type="text" name="message" cols="5" rows="5" class="form-control  "  ></textarea>
                                </div>

                            </div>
                            <div class="col-md-12 outer-bottom-small m-t-20">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-3 contact-info">
                        <div class="contact-title">
                            <h4>Information</h4>
                        </div>
                        <div class="clearfix address">
                            <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                            <span class="contact-span">{!! $gn->site_address !!}</span>
                        </div>
                        <div class="clearfix phone-no">
                            <span class="contact-i"><i class="fa fa-mobile"></i></span>
                            <span class="contact-span">{{$gn->site_phone}}<br>{{$gn->site_alt_phone}}</span>
                        </div>
                        <div class="clearfix email">
                            <span class="contact-i"><i class="fa fa-envelope"></i></span>
                            <span class="contact-span"><a href="#">{{$gn->site_email}}</a></span>
                        </div>
                    </div>
                </div>
                <!-- /.contact-page -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <br>
            <br>
            <br>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>

@stop
