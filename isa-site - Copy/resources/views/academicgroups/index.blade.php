@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('academicgroups.create') }}" role="button">Add New Academic group</a>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr><th>ID</th>
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
                <td><img width="100" src="/storage/images/{{ $academicgroup->picture  }}" alt=''/>  </td>
                <td>{{ $academicgroup->department->name }}  </td>
                <td class="actions">
                <a
                        href="{{ route('academicgroups.show', ['academicgroup' => $academicgroup->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ route('academicgroups.edit', ['academicgroup' => $academicgroup->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ route('academicgroups.destroy', ['academicgroup' => $academicgroup->id]) }}" method="POST">
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
