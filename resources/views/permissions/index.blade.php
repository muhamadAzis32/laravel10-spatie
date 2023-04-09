@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Permissions</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permissions</a>
                @endcan
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($permissions as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <form action="{{ route('permissions.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('permissions.edit', $product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $permissions->links() !!}
@endsection
