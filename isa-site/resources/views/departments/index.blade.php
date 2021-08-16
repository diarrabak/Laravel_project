@extends('layouts.app')

@section('buttons')
@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
<a class="btn btn-primary" href="{{ route('departments.create') }}" role="button">Add New department</a>
@endif
@endsection

@section('content')
<h1 class="main-title">Different departments in ISA</h1>
<div class="row">
    @forelse ($departments as $department)


    <article class="card col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/{{ $department->picture  }}" alt='{{ $department->picture  }}' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('departments.show', ['department' => $department->id]) }}"> {{ $department->name }} </a></h5>

        </div>
        @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
        <div class="row">
            <!--div class="col-12 col-sm-4">
                <a class="btn btn-success" href="{{ route('departments.show', ['department' => $department->id]) }}" alt="View" title="View">
                    Details
                </a>
            </div-->
            <div class="col-12 col-sm-4">
                <a class="btn btn-primary" href="{{ route('departments.edit', ['department' => $department->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
            </div>

            <div class="col-12 col-sm-4">
                <form action="{{ route('departments.destroy', ['department' => $department->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" title="Delete" value="DELETE">Delete</button>
                </form>
            </div>
        </div>
        @endif



    </article>


    @empty
    @endforelse

</div>

@endsection