@extends('admin.layouts.base')
@section('extra_style')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endsection
@section('title', 'Add Task')
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
                    <li class="breadcrumb-item active">Task</li>
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
                <h3 class="card-title">New Task</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.tasks.index') }}" class="btn btn-primary">Task List</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('admin.tasks.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="subject">Subject <span class="text-danger">*</span></label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{old('subject')}}">
                        @error('subject')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="starting_date">Starting Date <span class="text-danger">*</span></label>
                        <input type="date" name="starting_date" class="form-control @error('starting_date') is-invalid @enderror " value="{{old('starting_date')}}">
                        @error('starting_date')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="due_date">Due Date <span class="text-danger">*</span></label>
                        <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{old('due_date')}}">
                        @error('due_date')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>

                    <div class="row">

                    <div class="col-md-6 form-group">
                        <label for="project_id">Project <span class="text-danger">*</span></label>
                        <select name="project_id" class="form-control @error('project_id') is-invalid @enderror" value="{{old('project_id')}}">
                        <option value="">--Belongs to--</option>    
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                            @endforeach
                        </select>
                        @error('project_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="assignees">Assignee <span class="text-danger">*</span></label>
                        <select name="user_id" class="@error('user_id') is-invalid @enderror form-control"   style="width: 100%;" value="{{old('user_id')}}">
                        <option value="">--Assign to --</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    </div>

                    <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="priority">Priority <span class="text-danger">*</span></label>
                        <select name="priority" class="form-control @error('priority') is-invalid @enderror" value="{{old('priority')}}">
                            <option value="">--Select Priority--</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                        @error('priority')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" value="{{old('status')}}">
                        <option value="">--Select Status--</option>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                        @error('status')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Task Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{old('descripiton')}}</textarea>
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary">Create Task</button>
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
        $('.select2Client').select2()
        $('#ratePerHour').hide();
        $('#fixedRate').hide();


        $('#billing_type').on('change', function() {
            let billing_type = $(this).val();
            console.log(billing_type)
            if (billing_type == 1) {
                $('#fixedRate').show();
            } else if (billing_type == 2) {
                $('#ratePerHour').show();
            } else {

            }

        });

    });
</script>
@endsection