@extends('layouts.app')

@section('content')
<div class="col">
   <form action="{{ route('articles.update', ['article' => $article]) }}" method="POST">
   @method('PUT')
   @csrf
    <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') ?? $article->title ??'' }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') ?? $article->link ??'' }}"  required autocomplete="link">

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publication" class="col-md-4 col-form-label text-md-right">{{ __('Publication') }}</label>

                            <div class="col-md-6">
                                <input id="publication" type="text" class="form-control @error('publication') is-invalid @enderror" name="publication" value="{{ old('publication') ?? $article->publication ??'' }}"  required autocomplete="publication">

                                @error('publication')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="date" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') ?? $article->year ??'' }}" name="year" required autocomplete="year">

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="authors" class="col-md-4 col-form-label text-md-right">{{ __('Authors') }}</label>

                            <div class="col-md-6">
                                <textarea id="authors" class="form-control @error('authors') is-invalid @enderror" name="authors"  required autocomplete="authors">{{ old('authors') ?? $article->authors ??'' }} </textarea>

                                @error('authors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right" for="user_id">User</label>
        <div class="col-sm-6">
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach($users as $id => $display)
                    <option value="{{ $id }}" {{ (isset($author->id) && $id === $author->id) ? 'selected' : '' }}>{{ $display }}</option>
                @endforeach
            </select>
        </div>
    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add article
                                </button>
                            </div>
                            <div class="col-md-4">
                              <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
                           </div>
                        </div>
   </form>
</div>
@endsection