<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
        public function index(Request $request)
        {
            if ($request->ajax()) {
                $users = User::latest()->get();
                return DataTables::of($users)
                    ->addIndexColumn()
                    ->addColumn('btn', 'admin.users.partials.btn')
                    ->addColumn('role', function ($user) {
                        return $user->getRoleNames()->first();
                    })                    
                    ->rawColumns(['btn','role'])
                    ->make(true);
            }

            return view('admin.users.index');
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $roles = Role::get();
        return view('admin.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeRequest $request,User $user)
    {
        $user = (new User)->fill($request->validated());
        if ($request->filled('role')) {
            $user->assignRole($request->role);
        }
        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $request->file('profile_picture')->store('public/imagenes/perfiles/');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( User $user)
    {
        return view('admin.users.show', compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user )
    {
        $roles = Role::get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $newRole = $request->input('role');
        $currentRole = $user->getRoleNames()->first();
        if ($currentRole != $newRole) {
            $user->syncRoles([$newRole]);
        }
        $user->update($validatedData);
        return redirect()->route('users.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
