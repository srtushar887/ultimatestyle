@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Blog Management</h4>

                <div class="page-title-right">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createBlog">Create New</button>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Blog List</h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Blog Title</th>
                                <th>Blog Category</th>
                                <th>Blog Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <?php
                                $bcats = \App\blog_category::where('id',$blog->blog_cat_id)->first();
                                ?>
                                <tr>
                                    <td>{{$blog->blog_title}}</td>
                                    <td>
                                        @if ($bcats)
                                            {{$bcats->category_name}}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td><img src="{{asset($blog->blog_image)}}" style="height: 50px;width: 50px;"></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editblog{{$blog->id}}"><i class="fas fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteblogCategory{{$blog->id}}"><i class="fas fa-trash"></i> </button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="deleteblogCategory{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Blog Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.delete.blog')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this blog category ?
                                                        <input type="hidden" class="form-control" name="blog_delete" value="{{$blog->id}}">
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




                                <div class="modal fade" id="editblog{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Blog</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.update.blog')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label>Blog Category</label>
                                                        <select class="form-control" name="blog_cat_id">
                                                            <option value="0" >select any</option>
                                                            @foreach($categories as $bcats)
                                                                <option value="{{$bcats->id}}" {{$blog->blog_cat_id == $bcats->id ? 'selected' : ''}}>{{$bcats->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Blog Title</label>
                                                        <input type="text" class="form-control" name="blog_title" value="{{$blog->blog_title}}">
                                                        <input type="hidden" class="form-control" name="blog_edit" value="{{$blog->id}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Blog Description</label>
                                                        <textarea type="text" cols="5" rows="5" class="form-control" name="blog_des">{!! $blog->blog_des !!}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Blog Image</label>
                                                        <br>
                                                        <img src="{{asset($blog->blog_image)}}" style="height: 100px;width: 100px;">
                                                        <input type="file" class="form-control" name="blog_image">
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
                        {{$blogs->links()}}
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>





    <div class="modal fade" id="createBlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Blog Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.save.blog')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Blog Category</label>
                            <select class="form-control" name="blog_cat_id">
                                <option value="0" >select any</option>
                                @foreach($categories as $bcats)
                                    <option value="{{$bcats->id}}">{{$bcats->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" class="form-control" name="blog_title">
                        </div>

                        <div class="form-group">
                            <label>Blog Description</label>
                            <textarea type="text" cols="5" rows="5" class="form-control" name="blog_des"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Blog Image</label>
                            <input type="file" class="form-control" name="blog_image">
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
