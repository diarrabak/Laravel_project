@extends('layouts.app')

@section('content')
<div class="col">
   <form action="{{ route('roles.store', ['role' => $role]) }}" method="POST">
   @csrf
    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $role->name ??'' }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right" for="users">Users</label>
        <div class="col-sm-6">
            <select multiple name="users[]" class="form-control" id="users" required>
                @foreach($users as $id => $display)
                    <option value="{{ $id }}" >{{ $display }}</option>
                @endforeach
            </select>
        </div>
    </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add role
                                </button>
                            </div>
                            <div class="col-md-4">
                              <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                           </div>
                        </div>
   </form>
</div>
@endsection