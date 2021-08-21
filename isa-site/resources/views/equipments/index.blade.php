@extends('layouts.app')

@section('buttons')
@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
<a class="btn btn-primary" href="{{ route('equipments.create') }}" role="button">Add New equipment</a>
@endif
@endsection

@section('content')
<h1 class="main-title">Different equipment in ISA</h1>
<div class="row">
    @forelse ($equipments as $equipment)


    <article class="card col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $equipment->picture  }}" alt='{{ $equipment->picture  }}' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('equipments.show', ['equipment' => $equipment->id]) }}"> {{ $equipment->name }} </a></h5>

        </div>
        @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
        <div class="row">

            <div class="col-12 col-sm-4">
                <a class="btn btn-primary" href="{{ route('equipments.edit', ['equipment' => $equipment->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
            </div>

            <div class="col-12 col-sm-4">
                <form action="{{ route('equipments.destroy', ['equipment' => $equipment->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" title="Delete" value="DELETE">Delete</button>
                </form>
            </div>
        </div>
        @endif


    </article>


    @empty
    <p class="col-12">No equipment available!</p>
    @endforelse

</div>

@endsection