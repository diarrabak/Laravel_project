@extends('layouts.app')

@section('content')
<div class="header">
    <img class="department-image home-page" src="/storage/images/doSRplUaMEZvGtbU6xU6Nu2T0j9v0YHuaPV5lmBy.jpg" alt='home page image' />

    <h1 class="department depart-header front">Welcome to ISA Mali</h1>
    <p class="department depart-desc">Hello</p>
</div>

<div class="row">

    <h2 class="col-12"> Programs and outcomes</h2>

    @forelse ($departments as $department)


    <article class="card col-sm-10 col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $department->picture  }}" alt='{{ $department->picture  }}' />
        <div class="card-body">
        <h5 class="card-title"><a href="{{ route('departments.show', ['department' => $department->id]) }}"> {{ $department->name }} </a></h5>

        </div>

        <div class="row">
            
            <div class="col-12 col-sm-4">
                <a class="btn btn-primary" href="{{ route('departments.edit', ['department' => $department->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
            </div>
            <div class="col-12 col-sm-4">
                <form action="{{ route('departments.destroy', ['department' => $department->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
                </form>
            </div>
        </div>



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
        <h5 class="card-title"><a href="{{ route('laboratories.show', ['laboratory' => $laboratory->id]) }}"> {{ $laboratory->name }} </a></h5>

        </div>
        <div class="row">
            
            <div class="col-12 col-sm-4">
                <a class="btn btn-primary" href="{{ route('laboratories.edit', ['laboratory' => $laboratory->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
            </div>
            <div class="col-12 col-sm-4">
                <form action="{{ route('laboratories.destroy', ['laboratory' => $laboratory->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
                </form>
            </div>
        </div>




    </article>


    @empty
    @endforelse

</div>
@endsection