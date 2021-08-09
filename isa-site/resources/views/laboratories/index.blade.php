@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('laboratories.create') }}" role="button">Add New laboratory</a>
@endsection

@section('content')

<div class="row">
    @forelse ($labs as $laboratory)


    <article class="card col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $laboratory->picture  }}" alt='{{ $laboratory->picture  }}' />
        <div class="card-body">
            <h5 class="card-title">{{ $laboratory->name }}</h5>

        </div>

        <a href="{{ route('laboratories.show', ['laboratory' => $laboratory->id]) }}" alt="View" title="View">
            See more
        </a>
        <a href="{{ route('laboratories.edit', ['laboratory' => $laboratory->id]) }}" alt="Edit" title="Edit">
            Edit
        </a>
        <form action="{{ route('laboratories.destroy', ['laboratory' => $laboratory->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
        </form>

    </article>


    @empty
    @endforelse

</div>


@endsection
