@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">Specialization ID</dt>
    <dd class="col-sm-9">{{ $specialization->id }}</dd>

    <dt class="col-sm-3">Specialization name</dt>
    <dd class="col-sm-9">{{ $specialization->name }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $specialization->description }}</dd>

    <dt class="col-sm-3">Image</dt>
    <dd class="col-sm-9"><img src="/storage/images/{{ $specialization->picture  }}" alt=''/> </dd>

    <dt class="col-sm-3">Specialization responsible</dt>
    <dd class="col-sm-9">{{ $specialization->user->name }}</dd>

    <dt class="col-sm-3">Specialization department</dt>
    <dd class="col-sm-9">{{ $specialization->department->name }}</dd>

</dl>


@endsection