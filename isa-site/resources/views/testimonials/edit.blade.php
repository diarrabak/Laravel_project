@extends('layouts.app')

@section('content')
<h1>Editing $testimonial->title</h1>
<form action="{{ route('testimonials.update', ['testimonial' => $testimonial]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $testimonial->title ??'' }}" required autocomplete="title" autofocus>

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

        <div class="col-md-6">
            <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" required autocomplete="comment">{{ old('comment') ?? $testimonial->comment ??'' }} </textarea>

            @error('comment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $testimonial->name ??'' }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

        <div class="col-md-6">
            <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" required autocomplete="picture">

            @error('picture')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="my-buttons form-group row mb-0">
        <div class="col-md-4 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Update testimonial
            </button>
        </div>
        <div class="col-md-4">
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection