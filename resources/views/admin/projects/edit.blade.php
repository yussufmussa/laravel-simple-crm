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
                <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="date" name="deadline" id="deadline" class="form-control" value="{{  $project->deadline}}">
                    </div>

                    <div class="form-group">
                        <label for="ForMembers">Members</label>
                        <div class="select2-purple">
                            <select name="user_id[]" class="@error('user_id') is-invalid @enderror select2" multiple="multiple" data-placeholder="Select Staff(s)" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($users as $user)
                                @if($user->role->id == 3 )
                                <option value="{{ $user->id }}" {{ in_array($user->id, $project->users->pluck('id')->toArray()) ? ' selected' : '' }}>{{ $user->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="client_id">Client</label>
                        <select name="client_id" id="client_id" class="form-control">
                            @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $client->id == $project->client_id ? ' selected' : '' }}>{{ $client->company }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $project->status == 'pending' ? ' selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $project->status == 'in_progress' ? ' selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $project->status == 'completed' ? ' selected' : '' }}>Completed</option>
                        </select>
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