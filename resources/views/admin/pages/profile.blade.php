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
                    <form class="needs-validation" novalidate="" action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Profile Image</label>
                                <br>
                                @if (!empty(Auth::user()->profile_image) && file_exists(Auth::user()->profile_image))
                                    <img class="rounded-circle header-profile-user" src="{{asset(Auth::user()->profile_image)}}" alt="{{Auth::user()->name}}"  style="height: 100px;width: 100px;">
                                @else
                                    <img class="rounded-circle header-profile-user" src="https://images-na.ssl-images-amazon.com/images/I/51e6kpkyuIL._AC_SX466_.jpg" alt="{{Auth::user()->name}}" style="height: 100px;width: 100px;">
                                @endif
                                <input type="file" name="profile_image" class="form-control" >

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Name</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" >
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Email</label>
                                <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" >
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Phone Number</label>
                                <input type="text" name="phone_number" value="{{Auth::user()->phone_number}}" class="form-control" >
                            </div>




                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
