@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('laboratories.create') }}" role="button">Add New laboratory</a>
@endsection

@section('content')

<h1 class="main-title">Laboratories of ISA</h1>

<div class="row">
    @forelse ($labs as $laboratory)


    <article class="card col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $laboratory->picture  }}" alt='{{ $laboratory->picture  }}' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('laboratories.show', ['laboratory' => $laboratory->id]) }}"> {{ $laboratory->name }} </a></h5>

        </div>

        <div class="row">
            <!--div class="col-12 col-sm-4">
                <a class="btn btn-success" href="{{ route('laboratories.show', ['laboratory' => $laboratory->id]) }}" alt="View" title="View">
                    More
                </a>
            </div-->
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