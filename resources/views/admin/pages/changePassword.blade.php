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
                    <form class="needs-validation" novalidate="" action="{{route('admin.password.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">


                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">New Password</label>
                                <input type="password" name="npass" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Confirm Password</label>
                                <input type="password" name="cpass" class="form-control" required>
                            </div>




                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
