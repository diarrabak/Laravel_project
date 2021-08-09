<?php

namespace App\Http\Controllers;

use App\Models\Information;

use App\Models\Department;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::get();
        return view('informations.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get()->pluck('name', 'id');
        return view('informations.create')
            ->with('departments', $departments)
            ->with('information', (new Information()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->document->store('images', 'public');
        $information = new Information([
            "title" => $request->get('title'),
            "description" => $request->get('description'),
            "document" => $request->document->hashName(),
            'semester' => $request->input('semester'),
            'department_id' => $request->input('department_id'),
        ]);

        $information->save(); // Finally, save the record.

        return redirect()->action([InformationController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('informations.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        $departments = Department::get()->pluck('name', 'id');
        $department = $information->department;
        return view('informations.edit')
            ->with('departments', $departments)
            ->with('department', $department)
            ->with('information', $information);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $request->document->store('images', 'public');
        $information->fill($request->input());
        $information->document = $request->document->hashName();
        $information->save();
        return redirect()->action([InformationController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        Information::where('id', $information->id)->delete();
        return redirect()->action([InformationController::class, 'index']);
    }
}
