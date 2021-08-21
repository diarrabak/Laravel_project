<?php

namespace App\Http\Controllers;

use App\Models\Jobopening;
use App\Models\Department;
use Illuminate\Http\Request;

class JobopeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobopenings = Jobopening::get();
        return view('jobopenings.index', compact('jobopenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get()->pluck('name', 'id');
        return view('jobopenings.create')
            ->with('departments', $departments)
            ->with('jobopening', (new Jobopening()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jobopening::create($request->input());

        return redirect()->action([JobopeningController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobopening  $jobOpening
     * @return \Illuminate\Http\Response
     */
    public function show(Jobopening $jobopening)
    {
        return view('jobopenings.show')
            ->with('jobopening', $jobopening);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobopening  $jobOpening
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobopening $jobopening)
    {
        $departments = Department::get()->pluck('name', 'id');
        $department = $jobopening->department;
        return view('jobopenings.edit')
            ->with('jobopening', $jobopening)
            ->with('departments', $departments)
            ->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobopening  $jobOpening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobopening $jobopening)
    {
        $jobopening->fill($request->input());
        $jobopening->save();
        return redirect()->action([JobopeningController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobopening  $jobOpening
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobopening $jobopening)
    {
        Jobopening::where('id', $jobopening->id)->delete();
        return redirect()->action([JobopeningController::class, 'index']);
    }
}
