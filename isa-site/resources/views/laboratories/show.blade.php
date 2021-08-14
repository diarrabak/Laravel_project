@extends('layouts.app')

@section('content')

<div class="header">
    <img class="department-image" src="/storage/images/{{ $laboratory->picture  }}" alt='{{ $laboratory->name }}' />

    <h1 class="department depart-header">{{ $laboratory->name }}</h1>
</div>
<div class="row">

    <h2 class="col-12"> Information about {{ $laboratory->name }} Lab</h2>
    <p class="col-12">The responsible of the {{ $laboratory->name }} lab is <a href="{{route('users.show',['user'=>$laboratory->user])}}">{{ $laboratory->user->name }} </a>
        and its linked to the <a href="{{route('departments.show',['department'=>$laboratory->department])}}">{{ $laboratory->department->name }} </a> department.</p>
    <p class="col-12">{{ $laboratory->description }}</p>
</div>


@endsection