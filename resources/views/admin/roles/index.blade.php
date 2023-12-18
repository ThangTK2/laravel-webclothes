@extends('admin.layouts.app')
@section('title', 'Roles')

@section('content')
    <div class="card">
        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>Role list</h1>
        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>DisplayName</th>
                <th>Action</th>
            </tr>

            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" id="form-delete{{ $role->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-delete btn-danger" data-id={{ $role->id }}>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{-- paginate --}}
        {{ $roles->links() }}
    </div>
@endsection
