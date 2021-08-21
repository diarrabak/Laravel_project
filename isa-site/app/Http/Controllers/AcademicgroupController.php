<?php

namespace App\Http\Controllers;

use App\Models\Academicgroup;
use App\Models\Department;
use Illuminate\Http\Request;

class AcademicgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicgroups = Academicgroup::get();
        return view('academicgroups.index', compact('academicgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get()->pluck('name', 'id');
        return view('academicgroups.create')
            ->with('departments', $departments)
            ->with('academicgroup', (new Academicgroup()));
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
        $academicgroup = new Academicgroup([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "picture" => $request->picture->hashName(),
            "department_id" => $request->get('department_id'),
        ]);
        $academicgroup->save(); // Finally, save the record.

        return redirect()->action([AcademicgroupController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Academicgroup  $academicGroup
     * @return \Illuminate\Http\Response
     */
    public function show(Academicgroup $academicgroup)
    {
        return view('academicgroups.show', compact('academicgroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Academicgroup  $academicGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Academicgroup $academicgroup)
    {
        $departments = Department::get()->pluck('name', 'id');
        $department = $academicgroup->department;
        return view('academicgroups.edit')
            ->with('department', $department)
            ->with('departments', $departments)
            ->with('academicgroup', $academicgroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Academicgroup  $academicGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academicgroup $academicgroup)
    {
        $request->picture->store('images', 'public');
        $academicgroup->fill($request->input());
        $academicgroup->picture = $request->picture->hashName();
        $academicgroup->save();
        return redirect()->action([AcademicgroupController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Academicgroup  $academicGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academicgroup $academicgroup)
    {
        Academicgroup::where('id', $academicgroup->id)->delete();
        return redirect()->action([AcademicgroupController::class, 'index']);
    }
}
