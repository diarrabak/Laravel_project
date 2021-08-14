@extends('layouts.app')

@section('content')
<div class="header">
    <img class="department-image" src="/storage/images/{{ $specialization->picture  }}" alt='{{ $specialization->name }}' />

    <h1 class="department depart-header">{{ $specialization->name }}</h1>
</div>
<div class="row">
    <h2 class="col-12"> {{ $specialization->name }} program details</h2>
    <p class="col-12">{{ $specialization->description }}</p>
</div>
<div class="row">

    <h2 class="col-12"> Courses in {{ $specialization->name }}</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Course title</th>
                <th class="md-visible">Description </th>
                <th class="lg-visible">Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specialization->courses as $course)
            <tr>
                <td><a href="{{route('courses.show',['course'=>$course])}}"> {{$course->title}}</a></td>
                <td class="md-visible">{{$course->description}}</td>
                <td class="lg-visible">{{$course->semester}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection