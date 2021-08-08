@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">Laboratory ID</dt>
    <dd class="col-sm-9">{{ $laboratory->id }}</dd>

    <dt class="col-sm-3">Lab name</dt>
    <dd class="col-sm-9">{{ $laboratory->name }}</dd>

    <dt class="col-sm-3">Lab description</dt>
    <dd class="col-sm-9">{{ $laboratory->description }}</dd>

    <dt class="col-sm-3">Image</dt>
    <dd class="col-sm-9"><img src="{{ $laboratory->picture  }}" alt=''/> </dd>

    <dt class="col-sm-3">Lab responsible</dt>
    <dd class="col-sm-9">{{ $laboratory->user->name }}</dd>

    <dt class="col-sm-3">Lab department</dt>
    <dd class="col-sm-9">{{ $laboratory->department->name }}</dd>

</dl>


@endsection