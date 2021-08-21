@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('roles.create') }}" role="button">Add New role</a>
@endsection

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td class="actions">
                <a href="{{ route('roles.show', ['role' => $role->id]) }}" alt="View" title="View">
                    View
                </a>
                <a href="{{ route('roles.edit', ['role' => $role->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
                <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
                </form>

            </td>
        </tr>
        @empty
        <tr>
            <td class="no-data">No roles available!</td>

        </tr>
        @endforelse
    </tbody>
</table>
@endsection