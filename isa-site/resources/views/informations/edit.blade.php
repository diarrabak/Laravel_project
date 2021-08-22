@extends('layouts.app')

@section('content')
<h1>Editing {{$information->title}}</h1>
<form action="{{ route('informations.update', ['information' => $information]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $information->title ??'' }}" required autocomplete="title" autofocus>

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

        <div class="col-md-6">
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="biography">{{ old('description') ?? $information->description ??'' }} </textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>

        <div class="col-md-6">
            <input id="document" type="file" class="form-control @error('document') is-invalid @enderror" name="document" required autocomplete="document">

            @error('document')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="semester" class="col-md-4 col-form-label text-md-right">{{ __('Semester') }}</label>

        <div class="col-md-6">
            <input id="semester" type="text" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ old('semester') ?? $information->semester ??'' }}" required autocomplete="semester" autofocus>

            @error('semester')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right" for="department_id">Department</label>
        <div class="col-sm-6">
            <select name="department_id" class="form-control" id="department_id" required>
                @foreach($departments as $id => $display)
                <option value="{{ $id }}" {{ (isset($department->id) && $id === $department->id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="my-buttons form-group row mb-0">
        <div class="col-md-4 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Update information
            </button>
        </div>
        <div class="col-md-4">
            <a href="{{ route('informations.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection