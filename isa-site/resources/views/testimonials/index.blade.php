@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('testimonials.create') }}" role="button">Leave a testimonial</a>
@endsection

@section('content')
<h1 class="main-title">Testimonials from alumni</h1>
<div class="row justify-content-lg-center">

    @forelse ($testimonials as $testimonial)


    <article class="col-12">

        <div class="testimonial rounded">
            <h4>{{$testimonial->title}}</h4>
            <p> {{$testimonial->comment}}</p>
            <img class="rounded-circle" src="/storage/images/{{ $testimonial->picture  }}" alt='{{ $testimonial->picture  }}' />
            <h5 class="card-title"><a href="{{ route('testimonials.show', ['testimonial' => $testimonial->id]) }}"> {{ $testimonial->name }} </a></h5>
        </div>

        <div class="row">

            <div class="col-12 col-sm-2 offset-sm-4">
                <a class="btn btn-primary" href="{{ route('testimonials.edit', ['testimonial' => $testimonial->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
            </div>

            <div class="col-12 col-sm-4">
                <form action="{{ route('testimonials.destroy', ['testimonial' => $testimonial->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" title="Delete" value="DELETE">Delete</button>
                </form>
            </div>
        </div>



    </article>


    @empty
    @endforelse

</div>

@endsection