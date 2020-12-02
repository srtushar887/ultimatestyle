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
                    <form class="needs-validation" novalidate="" action="{{route('admin.notification.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Header Notification Message</label>
                                <textarea type="text" cols="5" rows="5" name="header_not"  class="form-control" id="summary-ckeditor-about">{!! $noti->header_not !!}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Header Notification Status</label>
                                <select class="form-control" name="header_not_status">
                                    <option value="0">select any</option>
                                    <option value="1" {{$noti->header_not_status == 1 ? 'selected' : ''}}>On</option>
                                    <option value="2" {{$noti->header_not_status == 2 ? 'selected' : ''}}>Off</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Body Notification Message</label>
                                <textarea type="text" cols="5" rows="5" name="body_not"  class="form-control" id="summary-ckeditor-privacy">{!! $noti->body_not!!}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Body Notification Status</label>
                                <select class="form-control" name="body_not_status">
                                    <option value="0">select any</option>
                                    <option value="1" {{$noti->body_not_status == 1 ? 'selected' : ''}}>On</option>
                                    <option value="2" {{$noti->body_not_status == 2 ? 'selected' : ''}}>Off</option>
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

@section('js')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor-about' );
        CKEDITOR.replace( 'summary-ckeditor-privacy' );
        CKEDITOR.replace( 'summary-ckeditor-trems' );
    </script>
@stop
