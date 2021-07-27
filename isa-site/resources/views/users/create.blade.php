@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store', ['user' => $user])  }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="First name, Last name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biography" class="col-md-4 col-form-label text-md-right">{{ __('Biography') }}</label>

                            <div class="col-md-6">
                                <textarea id="biography" class="form-control @error('biography') is-invalid @enderror" name="biography"  required autocomplete="biography">{{ old('biography') }} </textarea>

                                @error('biography')
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
                            <label for="research_gate" class="col-md-4 col-form-label text-md-right">{{ __('ResearchGate') }}</label>

                            <div class="col-md-6">
                                <input id="research_gate" type="text" class="form-control @error('research_gate') is-invalid @enderror" name="research_gate" value="{{ old('research_gate') }}" required autocomplete="research_gate">

                                @error('research_gate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="google_scholar" class="col-md-4 col-form-label text-md-right">{{ __('Google scholar') }}</label>

                            <div class="col-md-6">
                                <input id="google_scholar" type="text" class="form-control @error('google_scholar') is-invalid @enderror" name="google_scholar" value="{{ old('google_scholar') }}" required autocomplete="google_scholar">

                                @error('google_scholar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right" for="department_id">Department</label>
        <div class="col-sm-6">
            <select name="department_id" class="form-control" id="department_id">
                @foreach($departments as $id => $display)
                    <option value="{{ $id }}" {{ (isset($department->id) && $id === $department->id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right" for="academicgroup_id">Academic group</label>
        <div class="col-sm-6">
            <select name="academicgroup_id" class="form-control" id="academicgroup_id">
                @foreach($academicgroups as $id => $display)
                    <option value="{{ $id }}" {{ (isset($academicgroup->id) && $id === $academicgroup->id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
        </div>
    </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
