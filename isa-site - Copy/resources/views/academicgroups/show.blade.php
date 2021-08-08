@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">Academic group ID</dt>
    <dd class="col-sm-9">{{ $academicgroup->id }}</dd>

    <dt class="col-sm-3">Academic group name</dt>
    <dd class="col-sm-9">{{ $academicgroup->name }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $academicgroup->description }}</dd>

    <dt class="col-sm-3">Image</dt>
    <dd class="col-sm-9"><img src="{{ $academicgroup->picture  }}" alt=''/> </dd>

    <dt class="col-sm-3">Academic group department</dt>
    <dd class="col-sm-9">{{ $academicgroup->department->name }}</dd>

</dl>

<div class="row">
   <h2 class="col-12"> List of members </h2>

    @foreach($academicgroup->users as $user)
   
       <p class="col-4">{{$user->image}}</p>
       <p class="col-4">{{$user->name}}</p>
       <p class="col-4">{{$user->biography}}</p>
    
    @endforeach
</div>
@endsection