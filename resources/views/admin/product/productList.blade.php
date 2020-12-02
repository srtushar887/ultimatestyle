@extends('layouts.admin')

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
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Current Price</th>
                                <th>Product Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">
                                        <img src="{{asset($product->main_image)}}" style="height: 50px;width: 80px;">
                                    </th>
                                    <td>{{$product->product_name}}</td>
                                    <td>TK{{$product->current_price}}</td>
                                    <td>
                                        @if ($product->is_publish == 1)
                                            Published
                                        @elseif($product->is_publish == 2)
                                            Un-Published
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.product.edit',$product->id)}}">

                                            <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </button>
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteproduct{{$product->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="deleteproduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <input type="hidden" class="form-control" name="product_delete_id" value="{{$product->id}}">
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


                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>








@stop
