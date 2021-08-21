@extends('layouts.app')

@section('buttons')
@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
<a class="btn btn-primary" href="{{ route('articles.create') }}" role="button">Add New article</a>
@endif
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Authors</th>
            <th>Publication</th>
            <th>Year</th>
            <th>Author</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->authors }} </td>
            <td>{{ $article->publication }} </td>
            <td>{{ $article->year }} </td>
            <td>{{ $article->user->name }} </td>
            <td class="actions">
                @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
                <a href="{{ route('articles.show', ['article' => $article->id]) }}" alt="View" title="View">
                    View
                </a>
                <a href="{{ route('articles.edit', ['article' => $article->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
                <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @empty

        <tr>
            <td class="no-data">
                No articles available!
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection