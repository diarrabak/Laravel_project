<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
///Users and departments to add
use App\Models\User;
use App\Models\Department;

use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs=Laboratory::get();
        return view('laboratories.index', compact('labs'));
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
        return view('laboratories.create')
            ->with('users', $users)
            ->with('laboratory', (new Laboratory()))
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
        $request->picture->store('images', 'public');
        $laboratory = new Laboratory([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "picture" => $request->picture->hashName(),
            'user_id' => $request->input('user_id'),
            'department_id' => $request->input('department_id'),
        ]);

        $laboratory->save(); // Finally, save the record.

        return redirect()->action([LaboratoryController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $laboratory)
    {
        return view('laboratories.show', compact('laboratory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratory $laboratory)
    {
        $users = User::get()->pluck('name', 'id');
        $departments = Department::get()->pluck('name', 'id');
        $responsible = $laboratory->user;
        $department = $laboratory->department;
        return view('laboratories.edit')
            ->with('responsible', $responsible)
            ->with('department', $department)
            ->with('users', $users)
            ->with('departments', $departments)
            ->with('laboratory', $laboratory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        $request->picture->store('images', 'public');
        $laboratory->fill($request->input());
        $laboratory->picture= $request->picture->hashName();
        $laboratory->save();
        return redirect()->action([LaboratoryController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratory)
    {
        Laboratory::where('id', $laboratory->id)->delete();
        return redirect()->action([LaboratoryController::class,'index']);
    }
}
