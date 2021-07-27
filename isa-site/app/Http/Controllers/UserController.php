<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
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
        $users = User::paginate(20);
        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::get()->pluck('name', 'id');
        $academicgroups=Academicgroup::get()->pluck('name', 'id');
       return view('users.create')
       ->with('departments',$departments)
       ->with('academicgroups',$academicgroups)
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
        $request->picture->store('images', 'public');

        $user = new User([
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

        $user->save(); // Finally, save the record.

        return redirect()->action([UserController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
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
        $departments=Department::get()->pluck('name', 'id');
        $academicgroups=Academicgroup::get()->pluck('name', 'id');
        $academicgroup = $user->academicgroup;
        $department = $user->department;
        return view('users.edit')
        ->with('department', $department)
        ->with('academicgroups', $academicgroups)
        ->with('departments', $departments)
        ->with('academicgroup', $academicgroup);
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
        $user->fill($request->input());
        $user->save();
        return redirect()->action([UserController::class,'index']);
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
        return redirect()->action([UserController::class,'index']);
    }
}
