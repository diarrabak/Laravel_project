@extends('layouts.app')

@section('content')


<div class="row">

    <h2 class="col-12"> Details about {{ $testimonial->name }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th class="md-visible">Title </th>
                <th class="lg-visible">Comment </th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>
                    <img class="special-img" src="/storage/images/{{ $testimonial->picture  }}" alt='{{ $testimonial->name }}' />
                    <div>
                        <a href="{{route('testimonials.show',['testimonial'=>$testimonial])}}"> {{$testimonial->name}}</a>
                    </div>
                </td>
                <td class="md-visible">{{$testimonial->title}}</a></td>
                <td class="lg-visible">{{$testimonial->comment}}</td>

            </tr>

        </tbody>
    </table>

</div>

@endsection