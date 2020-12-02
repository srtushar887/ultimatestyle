@extends('layouts.admin')

@section('admin')



    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">General Settings</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.general.settings.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Name</label>
                                <input type="text" name="site_name" value="{{$gen->site_name}}" class="form-control" >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Site Email</label>
                                <input type="text" name="site_email" value="{{$gen->site_email}}" class="form-control" >

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Site Slogan</label>
                                <input type="text" name="site_slogan" value="{{$gen->site_slogan}}" class="form-control" >
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Site Mobile Number</label>
                                <input type="text" name="site_phone" value="{{$gen->site_phone}}" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Site Alt Mobile Number</label>
                                <input type="text" name="site_alt_phone" value="{{$gen->site_alt_phone}}" class="form-control" >
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Site Currency</label>
                                <input type="text" name="site_currency" value="{{$gen->site_currency}}" class="form-control" >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Top Header Background Color</label>
                                <input type="color" name="top_header_background_color" value="{{$gen->top_header_background_color}}" class="form-control" >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Bottom Header Background Color</label>
                                <input type="color" name="bottom_header_background_color" value="{{$gen->bottom_header_background_color}}" class="form-control" >
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Site Address</label>
                                <textarea type="text" name="site_address" class="form-control" >{!! $gen->site_address !!}</textarea>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Logo</label>
                                <br>
                                <img src="{{asset($gen->logo)}}" style="height: 100px;width: 100px;">
                                <input type="file" name="logo" class="form-control" >

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Icon</label>
                                <br>
                                <img src="{{asset($gen->icon)}}" style="height: 100px;width: 100px;">
                                <input type="file" name="icon" class="form-control" >

                            </div>

                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
