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
                    <form class="needs-validation" novalidate="" action="{{route('admin.static.data.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">About Us</label>
                                <textarea type="text" cols="5" rows="5" name="about_us"  class="form-control" id="summary-ckeditor-about">{!! $static->about_us !!}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Privacy & Policy</label>
                                <textarea type="text" cols="5" rows="5" name="privacy"  class="form-control" id="summary-ckeditor-privacy">{!! $static->privacy !!}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Terms & Condition</label>
                                <textarea type="text" cols="5" rows="5" name="terms"  class="form-control" id="summary-ckeditor-trems">{!! $static->terms !!}</textarea>
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
