@extends('layouts.app')

@section('buttons')
@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
<a class="btn btn-primary" href="{{ route('academicgroups.create') }}" role="button">Add New Academic group</a>
@endif
@endsection

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Department</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($academicgroups as $academicgroup)
        <tr>
            <td>{{ $academicgroup->id }}</td>
            <td>{{ $academicgroup->name }}</td>
            <td>{{ $academicgroup->description }} </td>
            <td><img width="100" src="/storage/images/{{ $academicgroup->picture  }}" alt='' /> </td>
            <td>{{ $academicgroup->department->name }} </td>
            <td class="actions">
                @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
                <a href="{{ route('academicgroups.show', ['academicgroup' => $academicgroup->id]) }}" alt="View" title="View">
                    View
                </a>
                <a href="{{ route('academicgroups.edit', ['academicgroup' => $academicgroup->id]) }}" alt="Edit" title="Edit">
                    Edit
                </a>
                <form action="{{ route('academicgroups.destroy', ['academicgroup' => $academicgroup->id]) }}" method="POST">
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
                No academic groups available !
            </td>
        </tr>

        @endforelse
    </tbody>
</table>
@endsection