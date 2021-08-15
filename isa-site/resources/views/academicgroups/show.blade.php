@extends('layouts.app')

@section('content')

<div class="header">
    <img class="department-image" src="/storage/images/{{ $academicgroup->picture  }}" alt='{{ $academicgroup->name }}' />

    <h1 class="department depart-header">{{ $academicgroup->name }}</h1>
    <p class="department depart-desc">{{ $academicgroup->description }}</dd>
</div>
<div class="row">

    <h2 class="col-12"> Members of the {{ $academicgroup->name }} group</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Member name</th>
                <th class="md-visible">Department </th>
                <th class="lg-visible">Biography</th>
            </tr>
        </thead>
        <tbody>
            @foreach($academicgroup->users as $user)
            <tr>
                <td>
                    <img class="special-img" src="/storage/images/{{ $user->picture  }}" alt='{{ $user->name }}' />
                    <div>
                        <a href="{{route('users.show',['user'=>$user])}}"> {{$user->name}}</a>
                    </div>
                </td>
                <td class="md-visible">{{$user->department->name}}</td>
                <td class="lg-visible">{{$user->biography}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection