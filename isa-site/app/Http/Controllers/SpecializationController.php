<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

//Bringing models
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializations=Specialization::get();
        return view('specializations.index',compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get()->pluck('name', 'id');
        $departments = Department::get()->pluck('name', 'id');
        return view('specializations.create')
            ->with('users', $users)
            ->with('specialization', (new Specialization()))
            ->with('departments', $departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$specialization = Specialization::create($request->input());*/

        $request->picture->store('images', 'public');
        $specialization = new Specialization([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "picture" => $request->picture->hashName(),
            'user_id' => $request->input('user_id'),
            'department_id' => $request->input('department_id'),
        ]);

        $specialization->save(); // Finally, save the record.

        return redirect()->action([SpecializationController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function show(Specialization $specialization)
    {
        return view('specializations.show',compact('specialization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialization $specialization)
    {
        $users = User::get()->pluck('name', 'id');
        $departments = Department::get()->pluck('name', 'id');
        $responsible = $specialization->user;
        $department = $specialization->department;
        return view('specializations.edit')
            ->with('responsible', $responsible)
            ->with('department', $department)
            ->with('users', $users)
            ->with('departments', $departments)
            ->with('specialization', $specialization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialization $specialization)
    {
        $specialization->fill($request->input());
        $specialization->save();
        return redirect()->action([SpecializationController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialization $specialization)
    {
        Specialization::where('id', $specialization->id)->delete();
        return redirect()->action([SpecializationController::class,'index']);
    }
}
