@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('courses.create') }}" role="button">Add New course</a>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr><th>ID</th>
            <th>Code</th>
            <th>Title</th>
            <th>Description</th>
            <th>Program</th>
            <th>Department</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->code }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }} </td>
                <td>{{ $course->specialization->name }} </td>
                <td>{{ $course->department->name }}  </td>
                <td class="actions">
                <a
                        href="{{ route('courses.show', ['course' => $course->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ route('courses.edit', ['course' => $course->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
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
