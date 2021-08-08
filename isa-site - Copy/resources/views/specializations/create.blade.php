@extends('layouts.app')

@section('content')
<div class="col">
   <form action="{{ route('specializations.store', ['specialization' => $specialization]) }}" method="POST" enctype="multipart/form-data">
   @csrf
    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $specialization->name ??'' }}" required autocomplete="name" autofocus>

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
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"  required autocomplete="biography">{{ old('description') ?? $specialization->description ??'' }} </textarea>

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
                                <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" required autocomplete="picture">

                                @error('picture')
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
                    <option value="{{ $id }}" {{ (isset($specialization->department_id) && $id === $specialization->department_id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right" for="user_id">User</label>
        <div class="col-sm-6">
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach($users as $id => $display)
                    <option value="{{ $id }}" {{ (isset($specilaization->user_id) && $id === $specilaization->user_id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
        </div>
    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add specialization
                                </button>
                            </div>
                            <div class="col-md-4">
                              <a href="{{ route('specializations.index') }}" class="btn btn-secondary">Cancel</a>
                           </div>
                        </div>
   </form>
</div>
@endsection