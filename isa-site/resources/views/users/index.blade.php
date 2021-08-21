@extends('layouts.app')

@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
@section('buttons')
<a class="btn btn-primary" href="{{ route('users.create') }}" role="button">Add New user</a>
@endsection

@endif
@section('content')

<h1 class="main-title">Staff directory of ISA</h1>
<div class="row">
    @forelse ($users as $user)

    <article class="card col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $user->picture  }}" alt='{{$user->name}}' />
        <div class="card-body">

            <h5 class="card-title"><a href="{{ route('users.show', ['user' => $user->id]) }}"> {{ $user->name }} </a></h5>
            <p class="card-text">Learn more about {{ $user->name }}'s research on <a href={{$user->research_gate}}>Researgate </a> and <a href={{$user->google_scholar}}>Google scholar. </a></p>
            @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
            <div class="row">
                <!--a class="btn btn-success" href="{{ route('users.show', ['user' => $user->id]) }}"> See more </a-->
                <div class="col-12 col-sm-4">
                    <a  class="btn btn-primary" href="{{ route('users.edit', ['user' => $user->id]) }}" alt="Edit" title="Edit">
                        Edit
                    </a>
                </div>
                <div class="col-12 col-sm-4">
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" title="Delete" value="DELETE">Delete</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </article>

    @empty
    <p class="col-12">No users in the table!</p>
    @endforelse
</div>
@endsection