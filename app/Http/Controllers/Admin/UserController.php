<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'role_id' => $request->role_id,
            'email_verified_at' => now(),
        ]);

        if($request->hasFile('profile_picture')){
            $user->addMediaFromRequest('profile_picture')->toMediaCollection('profile_picture');
        }

        return redirect()->route('admin.users.index')->with('message', 'User Created Succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('roles', 'user'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->validated());

        return redirect()->route('admin.users.index')->with('message', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
     
        $delete = $user->delete();

        return redirect()->route('admin.users.index')->with('message', 'User Deleted Succefully');
    }

    public function resetPasswordToDefault(Request $request){

        $user = User::findOrFail($request->id);
        $user->password = Hash::make($user->email);
        $user->save();

        return response()->json(['message', 'Password Restored Succefully']);

    }
}
