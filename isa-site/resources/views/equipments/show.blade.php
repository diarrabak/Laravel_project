@extends('layouts.app')

@section('content')


<div class="row">

    <h2 class="col-12"> Details about {{ $equipment->name }}</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th class="md-visible">Laboratory </th>
                <th class="lg-visible">Description </th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>
                    <img class="special-img" src="/storage/images/{{ $equipment->picture  }}" alt='{{ $equipment->name }}' />
                    <div>
                        {{$equipment->name}}
                    </div>
                </td>
                <td class="md-visible"> <a href="{{route('laboratories.show',['laboratory'=>$equipment->laboratory])}}">{{$equipment->laboratory->name}}</a></td>
                <td class="lg-visible">{{$equipment->description}}</td>

            </tr>
           
        </tbody>
    </table>

</div>

@endsection