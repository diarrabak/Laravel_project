@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('users.create') }}" role="button">Add New user</a>
@endsection

@section('content')
<div class="row">
@forelse ($users as $user)

    <article class="card col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $user->picture  }}" alt='{{$user->name}}' />
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->biography }}. You can discover more about his/her research on <a href={{$user->research_gate}}>Researgate </a> and <a href={{$user->google_scholar}}>Google scholar. </a></p>
            <a class="btn btn-success" href="{{ route('users.show', ['user' => $user->id]) }}"> See more </a>
            <a href="{{ route('users.edit', ['user' => $user->id]) }}" alt="Edit" title="Edit">
                Edit
            </a>
            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
            </form>
        </div>
    </article>

@empty
@endforelse
</div>
@endsection