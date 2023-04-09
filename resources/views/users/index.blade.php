@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->getRoleNames()->count() > 0)
                        @foreach ($user->getRoleNames() as $role)
                            {{ $role }}
                        @endforeach
                    @endif
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $user->id) }}"
                        method="POST">

                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $data->render() !!}
@endsection
