@extends('layouts.app')

@section('content')

<dl class="row">
    <dt class="col-sm-3">Role ID</dt>
    <dd class="col-sm-9">{{ $role->id }}</dd>

    <dt class="col-sm-3">Role name</dt>
    <dd class="col-sm-9">{{ $role->name }}</dd>

</dl>
<div class="row">
   <h2 class="col-12"> List of users </h2>

    @forelse($role->users as $user)
   
       <p class="col-12">{{$user->name}}</p>
    @empty
    <p class="col-12"> No users for {{ $role->name }} role</p>
    @endforelse
</div>
@endsection