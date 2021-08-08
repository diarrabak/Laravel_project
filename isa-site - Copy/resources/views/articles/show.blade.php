@extends('layouts.app')

@section('content')
<dl class="row">
    <dt class="col-sm-3">Aritcle ID</dt>
    <dd class="col-sm-9">{{ $article->id }}</dd>

    <dt class="col-sm-3">Title</dt>
    <dd class="col-sm-9">{{ $article->title }}</dd>

    <dt class="col-sm-3">Authors</dt>
    <dd class="col-sm-9">{{ $article->authors }}</dd>

    <dt class="col-sm-3">Article Review</dt>
    <dd class="col-sm-9">{{ $article->publication }}</dd>

    <dt class="col-sm-3">Year</dt>
    <dd class="col-sm-9">{{ $article->year}}</dd>

    <dt class="col-sm-3">Main author</dt>
    <dd class="col-sm-9">{{ $article->user->name }}</dd>

   

</dl>


@endsection