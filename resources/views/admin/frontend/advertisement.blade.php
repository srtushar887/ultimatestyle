@extends('layouts.admin')

@section('admin')



    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Advertisement</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.advertisement.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Add Image One</label>
                                <br>
                                <img src="{{asset($adds->add_image_one)}}" style="height: 100px;width: 100px;">
                                <input type="file" name="add_image_one" class="form-control" >

                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Add Image Two</label>
                                <br>
                                <img src="{{asset($adds->add_image_two)}}" style="height: 100px;width: 100px;">
                                <input type="file" name="add_image_two" class="form-control" >

                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Add Image Three</label>
                                <br>
                                <img src="{{asset($adds->add_image_three)}}" style="height: 100px;width: 100px;">
                                <input type="file" name="add_image_three" class="form-control" >

                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Add Image Four</label>
                                <br>
                                <img src="{{asset($adds->add_image_four)}}" style="height: 100px;width: 100px;">
                                <input type="file" name="add_image_four" class="form-control" >

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Add One Link</label>
                                <input type="text" name="add_one_link" value="{{$adds->add_one_link}}" class="form-control" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Add One Status</label>
                                <select class="form-control" name="add_one_status">
                                    <option value="0">select any</option>
                                    <option value="1" {{$adds->add_one_status == 1 ? 'selected' : ''}}>on</option>
                                    <option value="2" {{$adds->add_one_status == 2 ? 'selected' : ''}}>off</option>
                                </select>
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Add Two Link</label>
                                <input type="text" name="add_two_link" value="{{$adds->add_two_link}}" class="form-control" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Add Two Status</label>
                                <select class="form-control" name="add_two_status">
                                    <option value="0">select any</option>
                                    <option value="1" {{$adds->add_two_status == 1 ? 'selected' : ''}}>on</option>
                                    <option value="2" {{$adds->add_two_status == 2 ? 'selected' : ''}}>off</option>
                                </select>
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Add Three Link</label>
                                <input type="text" name="add_three_link" value="{{$adds->add_three_link}}" class="form-control" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Add Three Status</label>
                                <select class="form-control" name="add_three_status">
                                    <option value="0">select any</option>
                                    <option value="1" {{$adds->add_three_status == 1 ? 'selected' : ''}}>on</option>
                                    <option value="2" {{$adds->add_three_status == 2 ? 'selected' : ''}}>off</option>
                                </select>
                            </div>





                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Add Four Link</label>
                                <input type="text" name="add_four_link" value="{{$adds->add_four_link}}" class="form-control" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Add Four Status</label>
                                <select class="form-control" name="add_four_status">
                                    <option value="0">select any</option>
                                    <option value="1" {{$adds->add_four_status == 1 ? 'selected' : ''}}>on</option>
                                    <option value="2" {{$adds->add_four_status == 2 ? 'selected' : ''}}>off</option>
                                </select>
                            </div>




                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop
