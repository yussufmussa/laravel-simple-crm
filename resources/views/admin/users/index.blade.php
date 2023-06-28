@extends('admin.layouts.base')
@section('extra_style')
@endsection
@section('title', 'Users')
@section('contents')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content">
    <div class="container-fluid">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Client List</h3>
                <div class="card-tools">
                    <a href="{{route('admin.users.create')}}" class="btn btn-primary">Add User</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    <tbody>
                        @foreach($users as $key => $user)
                        @if($user->role->id != 1)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><img src="{{$user->getFirstMediaUrl('profile_picture')}}" class=""></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>
                                <a href="{{route('admin.users.edit', $user->id)}}"><i class="fa fa-pen-alt"></i></a>
                                <button type="submit" class="btn btn-info" id="resetPassword" value="{{$user->id}}">
                                    Reset
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#category{{$user->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!--  -->
                                <div class="modal fade" id="category{{$user->id}}">
                                    <div class="modal-dialog">
                                        <form action="{{route('admin.users.destroy', $user->id)}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Alert</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure??</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Yes,I do</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>

        </div><!-- /.container-fluid -->
</section>

@endsection
@section('extra_js')
<script>
    $(document).ready(function() {

        $(document).on('click', '#resetPassword', function() {
            let userId = $(this).val();
            // Get the CSRF token value
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Include the CSRF token in the request header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: '/admin/resetPasswordToDefault',
                method: 'GET',
                dataType: "json",
                data: {
                    id: userId
                },
                success: function(response) {
                    alert('Password reset successfully!');
                },
                error: function(xhr, status, error) {
                    alert('Failed to reset password. Please try again.');
                }
            })

        });

    });
</script>
@endsection