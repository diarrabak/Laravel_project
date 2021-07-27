@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">User ID</dt>
    <dd class="col-sm-9">{{ $user->id }}</dd>

    <dt class="col-sm-3">User name</dt>
    <dd class="col-sm-9">{{ $user->name }}</dd>

    <dt class="col-sm-3">Biography</dt>
    <dd class="col-sm-9">{{ $user->biography }}</dd>

    <dt class="col-sm-3">Picture</dt>
    <dd class="col-sm-9"><img src="/storage/images/{{ $user->picture  }}" alt=''/></dd>

    <dt class="col-sm-3">Research gate</dt>
    <dd class="col-sm-9">{{ $user->research_gate }}</dd>

    <dt class="col-sm-3">Google scholar</dt>
    <dd class="col-sm-9">{{ $user->google_scholar}}</dd>

</dl>


@endsection