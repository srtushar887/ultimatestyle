@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Contact Us Message</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Email List</h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contact_us as $con)
                                <tr>
                                    <td>{{$con->name}}</td>
                                    <td>{{$con->email}}</td>
                                    <td>{{$con->subject}}</td>
                                    <td>{!! $con->message !!}</td>
                                    <td>
                                        @if ($con->status == 1)
                                            New
                                        @elseif($con->status == 2)
                                            Already Replied
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#sendcontactmessage{{$con->id}}"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="sendcontactmessage{{$con->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Send Contact Message</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.send.contactmessage')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Message</label>
                                                        <textarea type="text" class="form-control" id="summary-ckeditor-conmesg" name="message"></textarea>
                                                        <input type="hidden" name="contact_id" value="{{$con->id}}">
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



                            @endforeach
                            </tbody>
                        </table>
                        {{$contact_us->links()}}
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>









@stop


@section('js')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor-conmesg' );
    </script>
@stop
