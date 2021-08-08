@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">Job opening ID</dt>
    <dd class="col-sm-9">{{ $jobopening->id }}</dd>

    <dt class="col-sm-3">Opportunity name</dt>
    <dd class="col-sm-9">{{ $jobopening->name }}</dd>

    <dt class="col-sm-3">Opportunities description</dt>
    <dd class="col-sm-9">{{ $jobopening->description }}</dd>

    <dt class="col-sm-3">Department</dt>
    <dd class="col-sm-9">{{ $jobopening->department->name }}</dd>

</dl>


@endsection