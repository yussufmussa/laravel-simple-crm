@extends('admin.layouts.base')
@section('extra_style')
@endsection
@section('title', 'Create Client')
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
                    <li class="breadcrumb-item active">Client</li>
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
                <h3 class="card-title">New client</h3>
                <div class="card-tools">
                    <a href="{{route('admin.clients.index')}}" class="btn btn-primary">Clients List</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('admin.clients.store')}}" method="post">@csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ForclientsName">Company <span class="text-danger">*</span></label>
                                <input type="text" name="company" class="@error('company') is-invalid @enderror form-control" value="{{old('company')}}">
                                @error('company')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ForclientsName">Email <span class="text-danger">*</span></label>
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
                                <label for="ForclientsName">Vat</label>
                                <input type="text" name="vat" class="@error('vat') is-invalid @enderror form-control" value="{{old('vat')}}">
                                @error('vat')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ForclientsName">Address</label>
                                <input type="text" name="address" class="@error('address') is-invalid @enderror form-control" value="{{old('address')}}">
                                @error('address')
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
                                <label for="ForclientsName">Website</label>
                                <input type="text" name="website" class="@error('website') is-invalid @enderror form-control" value="{{old('website')}}">
                                @error('website')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ForclientsName">Phone</label>
                                <input type="text" name="phone_number" class="@error('phone_number') is-invalid @enderror form-control" value="{{old('phone_number')}}">
                                @error('phone_number')
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