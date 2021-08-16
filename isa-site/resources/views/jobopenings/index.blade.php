@extends('layouts.app')
@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
@section('buttons')
<a class="btn btn-primary" href="{{ route('jobopenings.create') }}" role="button">Add New job opening</a>
@endsection
@endif

@section('content')
<table class="table">
    <thead>
        <tr><th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Department</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jobopenings as $jobopening)
            <tr>
                <td>{{ $jobopening->id }}</td>
                <td>{{ $jobopening->name }}</td>
                <td>{{ $jobopening->description }} </td>
                <td>{{ $jobopening->department->name }}  </td>
                <td class="actions">
                @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
                <a
                        href="{{ route('jobopenings.show', ['jobopening' => $jobopening->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ route('jobopenings.edit', ['jobopening' => $jobopening->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ route('jobopenings.destroy', ['jobopening' => $jobopening->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
                    </form>
@endif
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
@endsection
