@extends('layouts.app')

@section('content')

<h1>Editing {{$course->title}}</h1>
<form action="{{ route('courses.update', ['course' => $course]) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

        <div class="col-md-6">
            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') ?? $course->code ??'' }}" required autocomplete="code" autofocus />

            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $course->title ??'' }}" required autocomplete="title" autofocus />

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
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') ?? $course->description ??'' }} </textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="semester" class="col-md-4 col-form-label text-md-right">{{ __('Semester') }}</label>

        <div class="col-md-6">
            <input id="semester" type="text" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ old('semester') ?? $course->semester ?? '' }}" required autocomplete="semester" autofocus />

            @error('semester')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right" for="specialization_id">Specialization</label>
        <div class="col-sm-6">
            <select name="specialization_id" class="form-control" id="specialization_id" required>
                @foreach($specializations as $id => $display)
                <option value="{{ $id }}" {{ (isset($specialization->id) && $id === $specialization->id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
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
                Update course
            </button>
        </div>
        <div class="col-md-4">
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection