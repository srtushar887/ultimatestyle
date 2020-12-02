@extends('layouts.admin')

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
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Top Category Name</th>
                                <th>Middle Category Name</th>
                                <th>End Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($end_cats as $ecat)
                                <?php
                                $top_ct = \App\top_level_category::where('id',$ecat->top_cat_id)->first();
                                $mid_ct = \App\mid_level_category::where('id',$ecat->mid_cat_id)->first();

                                ?>
                                <tr>
                                    <td>
                                        @if ($top_ct)
                                            {{$top_ct->top_cat_name}}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>
                                        @if ($mid_ct)
                                            {{$mid_ct->mid_cat_name}}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>{{$ecat->end_cat_name}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editEndCategory{{$ecat->id}}"><i class="fas fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEndCategory{{$ecat->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="deleteEndCategory{{$ecat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        are you sure to delete this top category ?
                                                        <input type="hidden" class="form-control" name="delete_category" value="{{$ecat->id}}">
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




                                <div class="modal fade" id="editEndCategory{{$ecat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <select class="form-control" name="top_cat_id">
                                                            <option value="0">select any</option>
                                                            @foreach($top_cats as $tcat)
                                                                <option value="{{$tcat->id}}" {{$ecat->top_cat_id == $tcat->id ? 'selected' : ''}}>{{$tcat->top_cat_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Middle Category</label>
                                                        <select class="form-control" name="mid_cat_id">
                                                            <option value="0">select any</option>
                                                            @foreach($mid_cats as $mcat)
                                                                <option value="{{$mcat->id}}" {{$ecat->mid_cat_id == $mcat->id ? 'selected' : ''}}>{{$mcat->mid_cat_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Category Name</label>
                                                        <input type="text" class="form-control" name="end_cat_name" value="{{$ecat->end_cat_name}}">
                                                        <input type="hidden" class="form-control" name="edit_category" value="{{$ecat->id}}">
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


                            @endforeach
                            </tbody>

                        </table>
                        {{$end_cats->links()}}
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


@stop
