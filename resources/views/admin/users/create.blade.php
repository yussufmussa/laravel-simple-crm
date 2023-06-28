@extends('admin.layouts.base')
@section('extra_style')
@endsection
@section('title', 'Add Member')
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
                    <li class="breadcrumb-item active">Members</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<section class="content">
    <div class="container-fluid">

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">New Member</h3>
                <div class="card-tools">
                    <a href="{{route('admin.users.index')}}" class="btn btn-primary">Member List</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ForusersName">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{old('name')}}">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ForusersName">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ForusersName">Role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">--Select Role--</option>
                                    @foreach ($roles as $key => $role)
                                        @if($role->id != 1)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ForusersName">Profile</label>
                                <input type="file" name="profile_picture" class="@error('profile_picture') is-invalid @enderror form-control">
                                @error('profile_picture')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>



        </div><!-- /.container-fluid -->
</section>


@endsection
@section('extra_js')
@endsection