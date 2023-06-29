<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        $clients = Client::all();
        return view('admin.projects.create', compact('users', 'clients'));
    }

    public function store(StoreProjectRequest $request)
    {
        
        $project = Project::create($request->validated());
        $project->users()->sync($request->input('user_id', []));

        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $users = User::all();
        $clients = Client::all();
        return view('admin.projects.edit', compact('project', 'users', 'clients'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
       
        $project->update($request->validated());
        $project->users()->sync($request->input('user_id', []));

        return redirect()->route('admin.projects.index')->with('message', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Project deleted successfully.');
    }
}
