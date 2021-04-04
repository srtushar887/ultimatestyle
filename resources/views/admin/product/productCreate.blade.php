@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
@stop
@section('admin')



    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Create Product</h4>

                <div class="page-title-right">
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.save.product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Name</label>
                                <input type="text" name="product_name" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Old Price (if have)</label>
                                <input type="text" name="old_price" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product New Price</label>
                                <input type="text" name="current_price" class="form-control" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Main Category</label>
                                <select class="form-control" name="product_top_cat_id">
                                    <option value="0">select any</option>
                                    @foreach($top_cats as $tcat)
                                        <option value="{{$tcat->id}}">{{$tcat->top_cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Mid Category</label>
                                <select class="form-control" name="product_mid_cat_id">
                                    <option value="0">select any</option>
                                    @foreach($mid_cats as $mcat)
                                        <option value="{{$mcat->id}}">{{$mcat->mid_cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product End Category</label>
                                <select class="form-control" name="product_end_cat_id">
                                    <option value="0">select any</option>
                                    @foreach($end_cats as $ecat)
                                        <option value="{{$ecat->id}}">{{$ecat->end_cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Brand (if have)</label>
                                <select class="form-control" name="brand_id">
                                    <option value="0">select any</option>
                                    @foreach($brand as $brd)
                                        <option value="{{$brd->id}}">{{$brd->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select multiple="multiple" size="10" name="color_id[]" title="duallistbox_demo1[]">
                                        @foreach($color as $col)
                                            <option value="{{$col->id}}">{{$col->color_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <select multiple="multiple" size="10" name="size_id[]" title="duallistbox_demo2[]">
                                        @foreach($size as $siz)
                                            <option value="{{$siz->id}}">{{$siz->size_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Main Image</label>
                                <input type="file" name="main_image" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Image 1 (optional)</label>
                                <input type="file" name="image_one" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Image 2 (optional)</label>
                                <input type="file" name="image_two" class="form-control" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Image 3 (optional)</label>
                                <input type="file" name="image_three" class="form-control" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Image 4 (optional)</label>
                                <input type="file" name="image_four" class="form-control" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Image 5 (optional)</label>
                                <input type="file" name="image_five" class="form-control" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product Size Image</label>
                                <input type="file" name="product_size_image" class="form-control" >
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Sort Description</label>
                                <textarea type="text" cols="5" rows="5" name="sort_des" id="product-sort-des" class="form-control" ></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Product Long Description</label>
                                <textarea type="text" cols="5" rows="5" name="description" id="product-long-des" class="form-control" ></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Extra Description</label>
                                <textarea type="text" cols="5" rows="5" name="extra_description" id="product-extra-des" class="form-control" ></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Min Delivery Date</label>
                                <input type="number" name="min_del_date" class="form-control" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Max Delivery Date</label>
                                <input type="number" name="max_del_date" class="form-control" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Product Status</label>
                                <select class="form-control" name="is_publish">
                                    <option value="0">select any</option>
                                    <option value="1">Publish</option>
                                    <option value="2">Un-Publish</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Size Status</label>
                                <select class="form-control" name="size_status">
                                    <option value="0">select any</option>
                                    <option value="1">On</option>
                                    <option value="2">Off</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Courier Status</label>
                                <select class="form-control" name="curier_status">
                                    <option value="0">select any</option>
                                    <option value="1">On</option>
                                    <option value="2">Off</option>
                                </select>
                            </div>


                        </div>

                        <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@stop

@section('js')
    <script src="https://www.virtuosoft.eu/code/bootstrap-duallistbox/bootstrap-duallistbox/v3.0.2/jquery.bootstrap-duallistbox.js"></script>
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script>
        var demo1 = $('select[name="color_id[]"]').bootstrapDualListbox({
            nonSelectedListLabel: 'All Color',
            selectedListLabel: 'Assign Color',
            preserveSelectionOnMove: 'moved',
            moveAllLabel: 'Move all',
            removeAllLabel: 'Remove all'
        });


        var demo2 = $('select[name="size_id[]"]').bootstrapDualListbox({
            nonSelectedListLabel: 'All Size',
            selectedListLabel: 'Assign Size',
            preserveSelectionOnMove: 'moved',
            moveAllLabel: 'Move all',
            removeAllLabel: 'Remove all'
        });


        $("#demoform").submit(function() {
            alert($('[name="practice_id[]"]').val());
            return false;
        });
    </script>


    <script>
        CKEDITOR.replace( 'product-sort-des' );
        CKEDITOR.replace( 'product-long-des' );
        CKEDITOR.replace( 'product-extra-des' );

    </script>
@stop
