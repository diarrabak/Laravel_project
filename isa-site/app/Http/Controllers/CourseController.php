<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

//Adding the two parent controllers
use App\Models\Department;
use App\Models\Specialization;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::get()->pluck('name', 'id');
        $departments = Department::get()->pluck('name', 'id');

        return view('courses.create')
            ->with('specializations', $specializations)
            ->with('departments', $departments)
            ->with('course', (new Course()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Course::create($request->input());
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show')
            ->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $specializations = Specialization::get()->pluck('name', 'id');
        $departments = Department::get()->pluck('name', 'id');
        $specialization = $course->specialization;
        $department = $course->department;

        return view('courses.edit')
            ->with('specializations', $specializations)
            ->with('departments', $departments)
            ->with('course', $course)
            ->with('specialization', $specialization)
            ->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->fill($request->input());
        $course->save();

        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Course::where('id', $course->id)->delete();
        return redirect()->action([CourseController::class, 'index']);
    }
}
