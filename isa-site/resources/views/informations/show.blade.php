@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">Information ID</dt>
    <dd class="col-sm-9">{{ $information->id }}</dd>

    <dt class="col-sm-3">Specialization name</dt>
    <dd class="col-sm-9">{{ $information->name }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $information->description }}</dd>

    <dt class="col-sm-3">File</dt>
    <dd class="col-sm-9"><a href="/storage/images/{{ $information->document  }}" download> Download</a></dd>

    <dt class="col-sm-3">Specialization department</dt>
    <dd class="col-sm-9">{{ $information->department->name }}</dd>

</dl>


@endsection