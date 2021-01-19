@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">End Category</h4>

                <div class="page-title-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createendCategory">Create New</button>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="endcat">
                            <thead>
                            <tr>
                                <th>Top Category Name</th>
                                <th>Middle Category Name</th>
                                <th>End Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>





    <div class="modal fade" id="createendCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create End Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.save.endcategory')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Main Category</label>
                            <select class="form-control" name="top_cat_id">
                                <option value="0">select any</option>
                                @foreach($top_cats as $tcat)
                                    <option value="{{$tcat->id}}">{{$tcat->top_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Middle Category</label>
                            <select class="form-control" name="mid_cat_id">
                                <option value="0">select any</option>
                                @foreach($mid_cats as $mcat)
                                    <option value="{{$mcat->id}}">{{$mcat->mid_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>End Category Name</label>
                            <input type="text" class="form-control" name="end_cat_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="updateendcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update End Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.update.endcategory')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Main Category</label>
                            <select class="form-control topcatid" name="top_cat_id">
                                <option value="0">select any</option>
                                @foreach($top_cats as $tcat)
                                    <option value="{{$tcat->id}}">{{$tcat->top_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Middle Category</label>
                            <select class="form-control midcatid" name="mid_cat_id">
                                <option value="0">select any</option>
                                @foreach($mid_cats as $mcat)
                                    <option value="{{$mcat->id}}">{{$mcat->mid_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>End Category Name</label>
                            <input type="text" class="form-control endcatname" name="end_cat_name">
                            <input type="hidden" class="form-control endcatedit" name="edit_category">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deleteendcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete End Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete.endcategory')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are your sure to delete this end category ?
                            <input type="hidden" class="form-control endcatdelete" name="delete_category">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@stop


@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>

        function endcatdelete(id) {
            $('.endcatdelete').val(id);
        }
        function endcatupdate(id)
        {
            var id = id;
            $.ajax({
                type : "POST",
                url : "{{route('admin.endcat,single')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.endcatedit').val(id);
                    $('.topcatid').val(data.top_cat_id);
                    $('.midcatid').val(data.mid_cat_id);
                    $('.endcatname').val(data.end_cat_name);
                }
            });
        };



        $(document).ready(function (){
            $('#endcat').DataTable({
                "pageLength": 20,
                "lengthMenu": [[25, 50,75, -1], [25, 50,75, "All"]],
                "processing": true,
                "serverSide": true,
                "bSort": true,
                "responsive": true,
                "language": {
                    processing: '<div class="loading">Loading&#8230;</div>'
                },
                "ajax": {
                    "type": "POST",
                    data:{
                        '_token' : "{{csrf_token()}}",
                    },
                    "url": "{{route('admin.get.endcat')}}",
                },
                columns: [
                    { data: 'top_cat.top_cat_name', name: 'top_cat.top_cat_name',class : 'text-left' },
                    { data: 'mid_cat.mid_cat_name', name: 'mid_cat.mid_cat_name',class : 'text-left' },
                    { data: 'end_cat_name', name: 'end_cat_name',class : 'text-left' },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

            });
        })
    </script>
@endsection

