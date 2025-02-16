@extends('backend.layout.app')

@section('content')

<div class="col-12">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <h3 class="card-title text-center mb-4 text-primary">{{$title}}</h3>
            <div class="row g-3">
                <!-- Product Name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Title:</label>
                        <p class="form-control-plaintext"><a href="">{{ $product->name ?? '-' }}</a></p>
                    </div>
                </div>

                <!-- Product Images -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label fw-bold">Product Images:</label>
                        <div class="d-flex flex-wrap gap-2">
                            @forelse($product->images as $image)
                                <img src="{{ asset( $image->images) }}" alt="Product Image" class="img-thumbnail" style="max-width: 200px;">
                            @empty
                                <p class="text-muted">No images available</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Product Description:</label>
                        <p class="form-control-plaintext">{{ $product->description ?? 'No description available' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-end bg-light">
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary px-4">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary px-4">Back</a>
        </div>
    </div>
</div>

@endsection
