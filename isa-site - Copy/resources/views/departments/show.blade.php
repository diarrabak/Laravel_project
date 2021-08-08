@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">Department ID</dt>
    <dd class="col-sm-9">{{ $department->id }}</dd>

    <dt class="col-sm-3">Department name</dt>
    <dd class="col-sm-9">{{ $department->name }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $department->description }}</dd>

    <dt class="col-sm-3">Image</dt>
    <dd class="col-sm-9"><img src="/storage/images/{{ $department->picture  }}" alt=''/> </dd>

</dl>
<div class="row">
   <h2 class="col-12"> List of specializations </h2>

    @foreach($department->specializations as $specialization)
   
       <p class="col-4">{{$specialization->image}}</p>
       <p class="col-4">{{$specialization->name}}</p>
       <p class="col-4">{{$specialization->description}}</p>
    
    @endforeach
</div>
@endsection