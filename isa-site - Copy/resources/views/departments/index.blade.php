@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('departments.create') }}" role="button">Add New department</a>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr><th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->description }} </td>
                <td><img width="100" src="/storage/images/{{ $department->picture  }}" alt=''/>  </td>
                <td class="actions">
                <a
                        href="{{ route('departments.show', ['department' => $department->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ route('departments.edit', ['department' => $department->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ route('departments.destroy', ['department' => $department->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
                    </form>

                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
@endsection
