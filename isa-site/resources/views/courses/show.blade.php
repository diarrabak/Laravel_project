@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">Course ID</dt>
    <dd class="col-sm-9">{{ $course->id }}</dd>

    <dt class="col-sm-3">Course title</dt>
    <dd class="col-sm-9">{{ $course->title }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $course->description }}</dd>

    <dt class="col-sm-3">Program</dt>
    <dd class="col-sm-9">{{ $course->specialization->name }}</dd>

    <dt class="col-sm-3">Department</dt>
    <dd class="col-sm-9">{{ $course->department->name }}</dd>
   

</dl>

@endsection