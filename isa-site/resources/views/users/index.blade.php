@extends('layouts.app')

@section('buttons')
<a class="btn btn-primary" href="{{ route('users.create') }}" role="button">Add New user</a>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr><th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Biography</th>
            <th>Picture</th>
            <th>Researgate</th>
            <th>Google scholar</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }} </td>
                <td>{{ $user->biography }}</td>
                <td><img width="100" src="/storage/images/{{ $user->picture  }}" alt=''/>  </td>
                <td>{{ $user->research_gate }}</td>
                <td>{{ $user->google_scholar}}</td>
                <td class="actions">
                <a
                        href="{{ route('users.show', ['user' => $user->id]) }}"
                        alt="View"
                        title="View">
                      View
                    </a>
                    <a
                        href="{{ route('users.edit', ['user' => $user->id]) }}"
                        alt="Edit"
                        title="Edit">
                      Edit
                    </a>
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
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
{{ $users->links() }}
@endsection
