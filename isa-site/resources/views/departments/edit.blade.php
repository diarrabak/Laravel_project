@extends('layouts.app')

@section('content')
<h1>Edit {{$department->name}}</h1>
<form action="{{ route('departments.update', ['department' => $department]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" placeholder="First name, Last name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $department->name ??'' }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') ?? $department->description ??'' }} </textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

        <div class="col-md-6">
            <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') ?? $department->picture ??'' }}" required autocomplete="picture">

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
                Update department
            </button>
        </div>
        <div class="col-md-4">
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection