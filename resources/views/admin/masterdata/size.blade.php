@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Size</h4>

                <div class="page-title-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createSize">Create New</button>
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
                        <table class="table table-hover mb-0" id="sizes">
                            <thead>
                            <tr>
                                <th>Size</th>
                                <th>Size Price</th>
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





    <div class="modal fade" id="createSize" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.save.size')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Size Name</label>
                            <input type="text" class="form-control" name="size_name">
                        </div>
                        <div class="form-group">
                            <label>Size Price</label>
                            <input type="number" class="form-control" name="size_price">
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


    <div class="modal fade" id="upatesize" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.update.size')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Size Name</label>
                            <input type="text" class="form-control sizename" name="size_name">
                            <input type="hidden" class="form-control sizeedit" name="edit_size">
                        </div>
                        <div class="form-group">
                            <label>Size Price</label>
                            <input type="number" class="form-control sizeprice" name="size_price">
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


    <div class="modal fade" id="deletesize" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete.size')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete size ?
                            <input type="hidden" class="form-control sizedelete" name="delete_size">
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

        function sizedelete(id) {
            $('.sizedelete').val(id);
        }
        function sizeupdate(id)
        {
            var id = id;
            $.ajax({
                type : "POST",
                url : "{{route('admin.size,single')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.sizeedit').val(id);
                    $('.sizename').val(data.size_name);
                    $('.sizeprice').val(data.size_price);
                }
            });
        };



        $(document).ready(function (){
            $('#sizes').DataTable({
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
                    "url": "{{route('admin.get.sizes')}}",
                },
                columns: [
                    { data: 'size_name', name: 'size_name',class : 'text-left' },
                    { data: 'size_price', name: 'size_price',class : 'text-left' },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

            });
        })
    </script>
@endsection

