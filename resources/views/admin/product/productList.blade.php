@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Product</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.create.product')}}">

                        <button class="btn btn-success btn-sm">Create New</button>
                    </a>
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
                        <table class="table table-hover mb-0" id="products">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Current Price</th>
                                <th>Product Status</th>
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




    <div class="modal fade" id="deleteproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete.product')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this product ?
                            <input type="hidden" class="form-control productdelete" name="product_delete_id">
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

        function productdelete(id) {
            $('.productdelete').val(id);
        }
        function brandsupdate(id)
        {
            var id = id;
            $.ajax({
                type : "POST",
                url : "{{route('admin.brands,single')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.brandedit').val(id);
                    $('.brandname').val(data.brand_name);
                }
            });
        };



        $(document).ready(function (){
            $('#products').DataTable({
                "pageLength": 10,
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
                    "url": "{{route('admin.get.products')}}",
                },
                columns: [
                    {
                        data: 'main_image',
                        render: function(data) {
                            if(data == null) {
                                return '<img src="https://dirtbusters.co.uk/images/default/product.png" alt="" img style="width:100px; height:100px">';
                            }else {
                                return '<img src="{{url('/')}}/'+data+'" alt="" img style="width:100px; height:100px">';
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    { data: 'product_name', name: 'product_name',class : 'text-left' },
                    { data: 'current_price', name: 'current_price',class : 'text-left' },
                    {
                        data: 'is_publish',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>Publish</span>";
                            }else if (data == 2){
                                return "<span class='label label-info label-mini text-center'>Unpublish</span>";
                            }
                            else {
                                return "<span class='label label-info label-mini text-center'>Not Set Yet</span>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],

            });
        })
    </script>
@endsection
