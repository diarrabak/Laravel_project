@extends('layouts.app')

@if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
@section('buttons')
<a class="btn btn-primary" href="{{ route('specializations.create') }}" role="button">Add New specialization</a>
@endsection
@endif

@section('content')
<table class="table">
    <thead>
        <tr><th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>responsible</th>
            <th>Department</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($specializations as $specialization)
            <tr>
                <td>{{ $specialization->id }}</td>
                <td>{{ $specialization->name }}</td>
                <td>{{ $specialization->description }} </td>
                <td><img width="100" src="/storage/images/{{ $specialization->picture  }}" alt=''/>  </td>
                <td>{{ $specialization->user->name }} </td>
                <td>{{ $specialization->department->name }}  </td>
                <td class="actions">
                @if(!empty(session('email')) && in_array(strtolower('admin'), session('roles')))
                <a
                        href="{{ route('specializations.show', ['specialization' => $specialization->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ route('specializations.edit', ['specialization' => $specialization->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ route('specializations.destroy', ['specialization' => $specialization->id]) }}" method="POST">
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
