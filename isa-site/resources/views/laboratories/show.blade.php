@extends('layouts.app')

@section('content')

<div class="header">
    <img class="department-image" src="/storage/images/{{ $laboratory->picture  }}" alt='{{ $laboratory->name }}' />

    <h1 class="department depart-header">{{ $laboratory->name }}</h1>
    <p class="department depart-desc">{{ $laboratory->description }}</dd>
</div>
<div class="row">

    <h2 class="col-12"> Information about {{ $laboratory->name }} Lab</h2>
    <p>The responsible of the {{ $laboratory->name }} lab is {{ $laboratory->user->name }} 
        and its linked to the {{ $laboratory->department->name }} department.</p>
    
</div>


@endsection


