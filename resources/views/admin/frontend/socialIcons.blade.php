@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Social Icons</h4>

                <div class="page-title-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createsocialiocns">Create New</button>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <!-- end col -->


        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Slider List</h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Icon Name</th>
                                <th>Icon</th>
                                <th>Icon Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($icons as $icon)
                                <tr>
                                    <th scope="row">{{$icon->name}}</th>
                                    <td>{{$icon->icon}}</td>
                                    <td>{!! $icon->icon_link !!}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateicon{{$icon->id}}"><i class="fas fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteicon{{$icon->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="deleteicon{{$icon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Social Icon</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.icon.delete')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this icon ?
                                                        <input type="hidden" class="form-control" name="icon_delete" value="{{$icon->id}}">
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

                                <div class="modal fade" id="updateicon{{$icon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Social Icon</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.icon.update')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Icon Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{$icon->name}}">
                                                        <input type="hidden" class="form-control" name="icon_edit" value="{{$icon->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Icon <a href="">Get Icons</a></label>
                                                        <input type="text" class="form-control" name="icon" value="{{$icon->icon}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Icon Link</label>
                                                        <input type="text" class="form-control" name="icon_link" value="{{$icon->icon_link}}">
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
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>


    <div class="modal fade" id="createsocialiocns" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Social Icon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.icon.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Icon Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Icon <a href="">Get Icons</a></label>
                            <input type="text" class="form-control" name="icon">
                        </div>
                        <div class="form-group">
                            <label>Icon Link</label>
                            <input type="text" class="form-control" name="icon_link">
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
