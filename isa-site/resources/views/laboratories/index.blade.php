@extends('layouts.app')
@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
@section('buttons')
<a class="btn btn-primary" href="{{ route('laboratories.create') }}" role="button">Add New laboratory</a>
@endsection
@endif 

@section('content')

<h1 class="main-title">Laboratories of ISA</h1>

<div class="row">
    @forelse ($labs as $laboratory)


    <article class="card col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $laboratory->picture  }}" alt='{{ $laboratory->picture  }}' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('laboratories.show', ['laboratory' => $laboratory->id]) }}"> {{ $laboratory->name }} </a></h5>

        </div>
        @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
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
        @endif

    </article>


    @empty
    @endforelse

</div>


@endsection