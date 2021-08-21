<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get()->pluck('name', 'id');
        return view('roles.create')
            ->with('users', $users)
            ->with('role', (new Role()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->input());
        $role->users()->attach($request->get('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $users = User::get()->pluck('name', 'id');
        $currentUsers = $role->users;
        $Ids = [];
        foreach ($currentUsers as $user) {
            $ids[] = $user->id;
        }

        return view('roles.edit')
            ->with('users', $users)
            ->with('ids', $ids)
            ->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //Transfer the form data to the current role
        $role->fill($request->input());
        //Save the user and go to index page
        $role->save();
        $role->users()->detach();
        $role->users()->attach($request->get('users'));

        return redirect()->action([RoleController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::where('id', $role->id)->delete();
        return redirect()->action([RoleController::class, 'index']);
    }
}
