@extends('backend.layout.app')

@section('content')

<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{$title}}</h3>
        </div>
        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <!-- Product Name -->
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" required>{{ $product->description }}</textarea>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Existing Thumbnail -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Current Thumbnail</label><br>
                    <img src="{{ asset($product->image) }}" alt="Product Thumbnail" class="img-thumbnail" width="100">
                </div>

                <!-- Upload New Thumbnail -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Change Thumbnail</label>
                    <input type="file" class="form-control" name="image" accept="image/*">
                    <small class="form-text text-muted">Upload a high-quality image (JPEG, PNG).</small>
                </div>

                <!-- Existing Product Images -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Current Product Images</label><br>
                    @if ($product->images->isNotEmpty())
                        @foreach ($product->images as $image)
                            <img src="{{ asset($image->images) }}" alt="Product Image" class="img-thumbnail m-1" width="100">
                        @endforeach
                    @else
                        <p>No images available</p>
                    @endif
                </div>


                <!-- Upload New Product Images -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Change Product Images</label>
                    <input type="file" class="form-control" name="images[]" accept="image/jpeg,image/png" multiple>
                    <small class="form-text text-muted">Upload high-quality images (JPEG, PNG).</small>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</div>

@endsection
