@extends('admin.layouts.base')
@section('extra_style')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endsection
@section('title', 'Edit Project')
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
                    <li class="breadcrumb-item active">Project</li>
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
                <h3 class="card-title">New Project</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Projects List</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="post">
    @method('put')
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="@error('title') is-invalid @enderror form-control" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="starting_date">Starting Date <span class="text-danger">*</span></label>
                <input type="date" name="starting_date" class="@error('starting_date') is-invalid @enderror form-control" value="{{ old('starting_date', $project->starting_date) }}">
                @error('starting_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="deadline">Deadline <span class="text-danger">*</span></label>
                <input type="date" name="deadline" class="@error('deadline') is-invalid @enderror form-control" value="{{ old('deadline', $project->deadline) }}">
                @error('deadline')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="user_id">Staff(s) <span class="text-danger">*</span></label>
                <div class="select2-purple">
                    <select name="user_id[]" class="@error('user_id') is-invalid @enderror select2" multiple="multiple" data-placeholder="Select Staff(s)" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        @foreach ($users as $user)
                            @if($user->role->id == 3 )
                                <option value="{{ $user->id }}" {{ in_array($user->id, $project->users->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="client_id">Client <span class="text-danger">*</span></label>
                <select name="client_id" class="form-control @error('client_id') is-invalid @enderror" style="width: 100%;">
                    <option value="">--Select Client--</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ $client->id == $project->client_id ? 'selected' : '' }}>{{ $client->company }}</option>
                    @endforeach
                </select>
                @error('client_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status <span class="text-danger">*</span></label>
                <select name="status" class="@error('status') is-invalid @enderror form-control">
                    <option value="">--Select Status--</option>
                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancled">Cancel</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        @if($project->hourly_rate)
            <div class="form-group" id="ratePerHour">
                <label for="hourly_rate">Rate Per Hour</label>
                <input name="hourly_rate" class="@error('hourly_rate') is-invalid @enderror form-control" value="{{ $project->hourly_rate}}">
                @error('hourly_rate')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endif

            @if($project->fixed_rate)
            <div class="form-group" id="fixedRate">
                <label for="fixed_rate">Total Cost</label>
                <input name="fixed_rate" class="@error('fixed_rate') is-invalid @enderror form-control" value="{{ old('fixed_rate', $project->fixed_rate) }}">
                @error('fixed_rate')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Project Description <span class="text-danger">*</span></label>
                <textarea name="description" class="@error('description') is-invalid @enderror form-control" cols="5" rows="5">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

@endsection
@section('extra_js')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>
@endsection