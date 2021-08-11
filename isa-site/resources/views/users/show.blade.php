@extends('layouts.app')

@section('content')

<h1 class="main-title">Profile of {{$user->title}} {{$user->name}}</h1>

<article class="row bio">
    <div class="col-12">
        <img src="/storage/images/{{ $user->picture  }}" alt='{{ $user->name }}' />
        <p> {{ $user->biography }}</p>
    </div>


    <!--div class="col-12">
    <div class="row">
   <h2 class="col-sm-12"> Roles of {{$user->name}}  </h2>

    @foreach($user->roles as $role)
   
       <p class="col-sm-12">{{$role->name}}</p>
    
    @endforeach
</div>
</div-->

    <div class="row">

        <h4 class="col-sm-12"> Academic group</h4>

        <p class="col-sm-12"> {{$user->academicgroup->name}} </p>

        <h4 class="col-sm-12"> My research</h4>

        <div class="col-sm-12">Research gate: {{ $user->research_gate }}</div>

        <div class="col-sm-12">Google scholar: {{ $user->google_scholar}}</div>

        <h4 class="col-sm-12"> My publications</h4>
        <ul>

            @foreach($user->articles as $article)

            <li>{{$article->title}}</li>

            @endforeach
        </ul>
        <p class="col-sm-12"><a href="mailto:{{$user->email}}" class="btn btn-primary">Contact me!</a></p>
    </div>
</article>

@endsection