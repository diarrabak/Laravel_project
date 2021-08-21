<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Models\Role;
use App\Models\Academicgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //We can get all users with User::get() or we can use the paginate function specify the number of objects per page
        $users = User::paginate(20);  //Get all users (20 per page)
        return view('users.index')
            ->with('users', $users);  //Send the users to the users/index view for browser rendering
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get()->pluck('name', 'id'); //Choose all departments in pairs of name and id
        $academicgroups = Academicgroup::get()->pluck('name', 'id');
        $roles = Role::get()->pluck('name', 'id');
        return view('users.create')
            ->with('departments', $departments)
            ->with('roles', $roles)
            ->with('academicgroups', $academicgroups)
            ->with('user', (new User()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->picture->store('images', 'public');  //Store the user picture and use the path for display

        $user = new User([  //Passing the form data to the user object
            "name" => $request->get('name'),
            "email" => $request->get('email'),
            "title" => $request->get('title'),
            "biography" => $request->get('biography'),
            "picture" => $request->picture->hashName(),
            "research_gate" => $request->get('research_gate'),
            "google_scholar" => $request->get('google_scholar'),
            'department_id' => $request->input('department_id'),
            'academicgroup_id' => $request->input('academicgroup_id'),
            'password' => Hash::make($request->input('password')),

        ]);

        $user->save(); // Finally, save the user.
        $user->roles()->attach($request->get('roles'));

        return redirect()->action([UserController::class, 'index']); //Redirect to the index page
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //Pass the current element to the show view for rendering
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //Get all departments and academic groups in key pairs of name and id
        $departments = Department::get()->pluck('name', 'id');
        $academicgroups = Academicgroup::get()->pluck('name', 'id');
        $roles = Role::get()->pluck('name', 'id');
        $currentRoles = $user->roles;
        $ids = [];
        foreach ($currentRoles as $role) {
            $ids[] = $role->id;
        }
        //Get the group of the current user to automatically select  
        $academicgroup = $user->academicgroup;

        //Get the department of the current user to automatically select  
        $department = $user->department;
        // The above data are sent to the edit view
        return view('users.edit')
            ->with('department', $department)
            ->with('academicgroups', $academicgroups)
            ->with('departments', $departments)
            ->with('roles', $roles)
            ->with('ids', $ids)
            ->with('departments', $departments)
            ->with('academicgroup', $academicgroup)
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //store the new image 
        $request->picture->store('images', 'public');
        //Transfer the form data to the current user
        $user->fill($request->input());
        //Replace the picture field of the user by the path of the new picture
        $user->picture = $request->picture->hashName();
        //Save the user and go to index page
        $user->save();
        $user->roles()->detach();
        $user->roles()->attach($request->get('roles'));

        return redirect()->action([UserController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::where('id', $user->id)->delete();
        return redirect()->action([UserController::class, 'index']);
    }
}
