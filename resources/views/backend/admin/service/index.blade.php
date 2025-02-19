@extends('backend.layout.app')

@section('content')

<div class="container">
    <br>
    <h2 class="text-center">{{ $title }}</h2>
    <div class="text-end mb-3">
        <a href="{{ route('product.create') }}" class="btn btn-info">+ Add Service</a>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" alt="Product" style="width: 50px; height: 50px; object-fit: cover;">
                                </td>
                                <td><a href="{{route('product.show',$product->slug)}}">{{ $product->name }}</a></td>
                                <td><a href="">{{ $product->category->name ?? 'Uncategorized' }}</a></td>
                                <td>
                                    <span class="badge {{ $product->status ? 'badge bg-green-lt' : 'badge bg-red-lt' }}">
                                        {{ $product->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>

                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <x-backend.svg.editBtn />
                                        </a>

                                        <a href="{{ route('product.show', $product->slug) }}" class="btn btn-info btn-sm"data-bs-toggle="tooltip" data-bs-placement="top" title="Show">
                                            <x-backend.svg.showBtn />
                                        </a>


                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <x-backend.svg.deleteBtn />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <x-backend.svg.notfound-service-svg />
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
