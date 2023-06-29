@extends('admin.layouts.base')
@section('extra_style')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endsection
@section('title', 'Tasks')
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
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Task List</h3>
                <div class="card-tools">
                    <a href="{{route('admin.tasks.create')}}" class="btn btn-primary">Add Task</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Starting Date</th>
                            <th>Due Date</th>
                            <th>Assigned To</th>
                            <th>Priority</th>
                            <th>Actions</th>
                        </tr>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                        <tr>
                            <th>{{$key + 1}}</th>
                            <td>{{ $task->subject }}</td>
                            <td><span class="badge {{ $task->status === 'completed' ? 'badge-success' : ($task->status === 'pending' ? 'badge-warning' : 'badge-info') }}">{{ $task->status }}</span></td>
                            <td>{{ $task->starting_date}}</td>
                            <td>{{ $task->due_date}}</td>
                            <td>{{ $task->user->name}}</td>
                            <td><span class="badge {{ $task->priority === 'high' ? 'badge-danger' : ($task->priority  === 'medium' ?  'badge-warning' : 'badge-info') }}">{{ $task->priority }}</span></td>
                            <td>
                                <a href="{{route('admin.tasks.edit', $task->id)}}"><i class="fa fa-pen-alt"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#category{{$task->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!--  -->
                                <div class="modal fade" id="category{{$task->id}}">
                                    <div class="modal-dialog">
                                        <form action="{{route('admin.tasks.destroy', $task->id)}}" method="post">@csrf
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
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>

        </div><!-- /.container-fluid -->
</section>

@endsection
@section('extra_js')
@endsection