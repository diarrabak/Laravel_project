<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Department::get();
        return view('departments.index',compact('departments'));
    }

    /* Home page */
    public function homepage()
    {
        $departments=Department::get();
        $labs=Laboratory::get();
        return view('frontpages.homepage',compact('departments'),compact('labs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create')
               ->with('department', (new Department()));
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
        $department = new Department([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "picture" => $request->picture->hashName(),
        ]);
        $department->save(); // Finally, save the record.



        return redirect()->action([DepartmentController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->picture->store('images', 'public');
        $department->fill($request->input());
        $department->picture= $request->picture->hashName();
        $department->save();
        return redirect()->action([DepartmentController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        Department::where('id', $department->id)->delete();
        return redirect()->action([DepartmentController::class,'index']);
    }
}
