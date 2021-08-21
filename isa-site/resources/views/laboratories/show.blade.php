@extends('layouts.app')

@section('content')

<div class="header">
    <img class="department-image" src="/storage/images/{{ $laboratory->picture  }}" alt='{{ $laboratory->name }}' />

    <h1 class="department depart-header">{{ $laboratory->name }}</h1>
</div>
<div class="row">

    <h2 class="col-12"> Information about {{ $laboratory->name }} Lab</h2>
    <p class="col-12">The responsible of the {{ $laboratory->name }} lab is <a href="{{route('users.show',['user'=>$laboratory->user])}}">{{ $laboratory->user->name }} </a>
        and its linked to the <a href="{{route('departments.show',['department'=>$laboratory->department])}}">{{ $laboratory->department->name }} </a> department.</p>
    <p class="col-12">{{ $laboratory->description }}</p>
</div>

<div class="row">

    <h2 class="col-12"> Equipment in {{ $laboratory->name }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th class="md-visible">Laboratory </th>
                <th class="lg-visible">Description </th>
            </tr>
        </thead>
        <tbody>

            @forelse($laboratory->equipments as $equipment)

            <tr>
                <td>
                    <img class="special-img" src="/storage/images/{{ $equipment->picture  }}" alt='{{ $equipment->name }}' />
                    <div>
                        <a href="{{route('equipments.show',['equipment'=>$equipment])}}"> {{$equipment->name}}</a>
                    </div>
                </td>
                <td class="md-visible"> <a href="{{route('laboratories.show',['laboratory'=>$equipment->laboratory])}}">{{$equipment->laboratory->name}}</a></td>
                <td class="lg-visible">{{$laboratory->description}}</td>

            </tr>
            @empty
            <tr>
                <td class="color-red">No equipment in {{ $laboratory->name }} lab</td>

            </tr>
            @endforelse
        </tbody>
    </table>

</div>


@endsection