@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('departments.create') }}" role="button">Add New department</a>
@endsection

@section('content')

<div class="row">
    @forelse ($departments as $department)


    <article class="card col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $department->picture  }}" alt='{{ $department->picture  }}' />
        <div class="card-body">
            <h5 class="card-title">{{ $department->name }}</h5>

        </div>

        <a href="{{ route('departments.show', ['department' => $department->id]) }}" alt="View" title="View">
            See more
        </a>
        <a href="{{ route('departments.edit', ['department' => $department->id]) }}" alt="Edit" title="Edit">
            Edit
        </a>
        <form action="{{ route('departments.destroy', ['department' => $department->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
        </form>

    </article>


    @empty
    @endforelse

</div>

@endsection