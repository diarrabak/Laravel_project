@extends('layouts.app')

@section('content')

<div class="header">
    <img class="department-image" src="/storage/images/{{ $department->picture  }}" alt='{{ $department->name }}' />

    <h1 class="department depart-header">{{ $department->name }}</h1>
    <p class="department depart-desc">{{ $department->description }}</dd>
</div>
<div class="row">

    <h2 class="col-12"> Specializations in {{ $department->name }}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Program name</th>
                <th class="md-visible">Description </th>
                <th class="lg-visible">Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($department->specializations as $specialization)
            <tr>
                <td><a href="{{route('specializations.show',['specialization'=>$specialization])}}"> {{$specialization->name}}</a></td>
                <td class="md-visible">{{$specialization->description}}</td>
                <td class="lg-visible">Campus of Badalabougou</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row">

    <h2 class="col-12"> Academic groups in {{ $department->name }}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Group</th>
                <th class="md-visible">Description </th>
            </tr>
        </thead>
        <tbody>
            @foreach($department->academicgroups as $academicgroup)
            <tr>
                <td><a href="{{route('academicgroups.show',['academicgroup'=>$academicgroup])}}"> {{$academicgroup->name}}</a></td>
                <td class="md-visible">{{$academicgroup->description}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row">

    <h2 class="col-12"> Job openings in {{ $department->name }}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Job title</th>
                <th class="md-visible">Description </th>
                <th class="lg-visible">Industry</th>
            </tr>
        </thead>
        <tbody>
            @foreach($department->jobopenings as $jobopening)
            <tr>
                <td><a href="{{route('jobopenings.show',['jobopening'=>$jobopening])}}"> {{$jobopening->name}}</a></td>
                <td class="md-visible">{{$jobopening->description}}</td>
                <td class="lg-visible">Industry</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection