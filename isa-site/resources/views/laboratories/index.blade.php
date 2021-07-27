@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('laboratories.create') }}" role="button">Add New laboratory</a>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr><th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Responsible</th>
            <th>Department</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($labs as $laboratory)
            <tr>
                <td>{{ $laboratory->id }}</td>
                <td>{{ $laboratory->name }}</td>
                <td>{{ $laboratory->description }} </td>
                <td><img width="100" src="/storage/images/{{ $laboratory->picture  }}" alt=''/>  </td>
                <td>{{ $laboratory->user->name }} </td>
                <td>{{ $laboratory->department->name }}  </td>
                <td class="actions">
                <a
                        href="{{ route('laboratories.show', ['laboratory' => $laboratory->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ route('laboratories.edit', ['laboratory' => $laboratory->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ route('laboratories.destroy', ['laboratory' => $laboratory->id]) }}" method="POST">
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
