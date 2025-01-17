@extends('backend.layout.app')
@section('content')

<!-- resources/views/products/index.blade.php -->

<div class="col-12">
    <a href="{{route('product.create')}}">Add</a>
    <div class="card shadow-lg border-0">
        <div class="card-header text-center bg-primary text-white">
            <h3>Product List</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price &#2547;</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Add Delete Button if necessary -->
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('product.create') }}" class="btn btn-primary px-4">Add New Product</a>
        </div>
    </div>
</div>


@endsection
