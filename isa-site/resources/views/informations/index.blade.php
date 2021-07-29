@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('informations.create') }}" role="button">Add New information</a>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr><th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Files</th>
            <th>Department</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($informations as $information)
            <tr>
                <td>{{ $information->id }}</td>
                <td>{{ $information->title }}</td>
                <td>{{ $information->description }} </td>
                <td><a href="/storage/images/{{ $information->document  }}" download> Download</a> </td>
                <td>{{ $information->department->name }}  </td>
                <td class="actions">
                <a
                        href="{{ route('informations.show', ['information' => $information->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ route('informations.edit', ['information' => $information->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ route('informations.destroy', ['information' => $information->id]) }}" method="POST">
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
