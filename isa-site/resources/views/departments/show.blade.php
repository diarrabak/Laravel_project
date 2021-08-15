@extends('layouts.app')

@section('content')

<div class="header">
    <img class="department-image" src="/storage/images/{{ $department->picture  }}" alt='{{ $department->name }}' />

    <h1 class="department depart-header">{{ $department->name }}</h1>
    <p class="department depart-desc">{{ $department->description }}</p>
</div>

<div class="row">

    <h2 class="col-12"> Specializations in {{ $department->name }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Field</th>
                <th class="md-visible">Head of program </th>
                <th class="lg-visible">Description </th>
            </tr>
        </thead>
        <tbody>

            @foreach($department->specializations as $specialization)

            <tr>
                <td>
                    <img class="special-img" src="/storage/images/{{ $specialization->picture  }}" alt='{{ $specialization->name }}' />
                    <div>
                        <a href="{{route('specializations.show',['specialization'=>$specialization])}}"> {{$specialization->name}}</a>
                    </div>
                </td>
                <td class="md-visible"> <a href="{{route('users.show',['user'=>$specialization->user])}}">{{$specialization->user->name}}</a></td>
                <td class="lg-visible">{{$specialization->description}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="row">

    <h2 class="col-12"> Academic groups in {{ $department->name }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Group</th>
                <th class="md-visible">Description </th>
                <th class="lg-visible"> Department </th>
            </tr>
        </thead>
        <tbody>
            @foreach($department->academicgroups as $academicgroup)
            <tr>
                <td>
                    <img class="special-img" src="/storage/images/{{ $academicgroup->picture  }}" alt='{{ $academicgroup->name }}' />
                    <div>
                        <a href="{{route('academicgroups.show',['academicgroup'=>$academicgroup])}}"> {{$academicgroup->name}}</a>
                    </div>
                </td>
                <td class="md-visible">{{$academicgroup->description}}</td>
                <td class="lg-visible"> <a href="{{route('departments.show',['department'=>$academicgroup->department])}}">{{$academicgroup->department->name}}</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row">

    <h2 class="col-12"> Laboratories in {{ $department->name }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th class="lg-visible"> Description </th>
                <th class="md-visible">Responsible </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($department->laboratories as $laboratory)
            <tr>
                <td>
                    <img class="special-img" src="/storage/images/{{ $laboratory->picture  }}" alt='{{ $laboratory->name }}' />
                    <div>
                        <a href="{{route('laboratories.show',['laboratory'=>$laboratory])}}"> {{$laboratory->name}}</a>
                    </div>
                </td>
                <td class="md-visible">{{$laboratory->description}}</td>
                <td class="lg-visible"> <a href="{{route('users.show',['user'=>$laboratory->user])}}">{{$laboratory->user->name}}</a></td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row">

    <h2 class="col-12"> Career path in {{ $department->name }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Job title</th>
                <th class="md-visible">Description </th>
            </tr>
        </thead>
        <tbody>
            @foreach($department->jobopenings as $jobopening)
            <tr>
                <td><a href="{{route('jobopenings.show',['jobopening'=>$jobopening])}}"> {{$jobopening->name}}</a></td>
                <td class="md-visible">{{$jobopening->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection