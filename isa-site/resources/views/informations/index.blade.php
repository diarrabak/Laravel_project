@extends('layouts.app')
@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
@section('buttons')
<a class="btn btn-primary" href="{{ route('informations.create') }}" role="button">Add New information</a>
@endsection
@endif
@section('content')

<div class="header">
    <img class="department-image" src="/storage/images/news-img.jpg" alt='news picture' />

    <!--h1 class="department depart-header">Hot news of the moment</h1-->

</div>

<div class="row">
    @forelse ($informations as $information)


    <article class="news-article col-md-5">

        <h5> {{ $information->title }} for {{ $information->department->name }}</h5>
        <p class="info-desc">{{$information->description}}</p>
        <p> <a class="btn btn-success" href="/storage/images/{{ $information->document  }}" download> Download</a> </p>
        @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
        <div class="row">

            <div class="col-12 col-sm-4">
                <a class="btn btn-primary" href="{{ route('informations.edit', ['information' => $information->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
            </div>

            <div class="col-12 col-sm-4">
                <form action="{{ route('informations.destroy', ['information' => $information->id]) }}" method="POST">
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