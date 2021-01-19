@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Middle Category</h4>

                <div class="page-title-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createTopCategory">Create New</button>
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
                        <table class="table table-hover mb-0" id="midcat">
                            <thead>
                            <tr>
                                <th>Top Category Name</th>
                                <th>Middle Category Name</th>
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





    <div class="modal fade" id="createTopCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Middle Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.save.middlecategory')}}" method="post">
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
                            <label>Middle Category Name</label>
                            <input type="text" class="form-control" name="mid_cat_name">
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


    <div class="modal fade" id="updatmidcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Middle Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.update.middlecategory')}}" method="post">
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
                            <label>Middle Category Name</label>
                            <input type="text" class="form-control midcatname" name="mid_cat_name">
                            <input type="hidden" class="form-control midcatedit" name="edit_category">
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


    <div class="modal fade" id="deletemidcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Middle Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete.middlecategory')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this mid category?
                            <input type="hidden" class="form-control midcatedit" name="delete_category">
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

        function midcatdelete(id) {
            $('.midcatedit').val(id);
        }
        function midcatupdate(id)
        {
            var id = id;
            $.ajax({
                type : "POST",
                url : "{{route('admin.midcat,single')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.midcatedit').val(id);
                    $('.topcatid').val(data.top_cat_id);
                    $('.midcatname').val(data.mid_cat_name);
                }
            });
        };



        $(document).ready(function (){
            $('#midcat').DataTable({
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
                    "url": "{{route('admin.get.midcat')}}",
                },
                columns: [
                    { data: 'top_cat.top_cat_name', name: 'top_cat.top_cat_name',class : 'text-left' },
                    { data: 'mid_cat_name', name: 'mid_cat_name',class : 'text-left' },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

            });
        })
    </script>
@endsection


