@extends('layouts.app')

@section('content')
<div class="header">
    <img class="department-image" src="/storage/images/doSRplUaMEZvGtbU6xU6Nu2T0j9v0YHuaPV5lmBy.jpg" alt='home page image' />

    <h1 class="department depart-header">Welcome to ISA Mali</h1>
    <p class="department depart-desc">Hello</p>
</div>

<div class="row">

    <h2 class="col-12"> Programs and outcomes</h2>

    @forelse ($departments as $department)


    <article class="card col-sm-10 col-md-5 col-lg-4">
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


<div class="row">

    <h2 class="col-12"> Experimental facilities</h2>

    @forelse ($labs as $laboratory)


    <article class="card col-sm-10 col-md-5 col-lg-4">
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