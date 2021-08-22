@extends('layouts.app')

@section('content')
<h1>Editing {{$jobopening->name}}</h1>
<form action="{{ route('jobopenings.update', ['jobopening' => $jobopening]) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $jobopening->name ??'' }}" required autocomplete="name" autofocus>

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
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') ?? $jobopening->description ??'' }} </textarea>

            @error('description')
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
                Update jobopening
            </button>
        </div>
        <div class="col-md-4">
            <a href="{{ route('jobopenings.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
@endsection