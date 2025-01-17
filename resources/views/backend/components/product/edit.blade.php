@extends('backend.layout.app')
@section('content')

<!-- resources/views/products/edit.blade.php -->

<div class="col-12">
    <form class="card shadow-lg border-0" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <h3 class="card-title text-center mb-4 text-primary">Edit Product</h3>
            <div class="row g-3">
                <!-- Product Name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Product Name</label>
                        <input type="text" class="form-control border-2 border-primary" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name" required>
                    </div>
                </div>
                <!-- Price -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Price &#2547; </label>
                        <input type="number" class="form-control border-2 border-primary" name="price" value="{{ old('price', $product->price) }}" placeholder="Enter price" step="0.01" min="0" required>
                    </div>
                </div>
                <!-- Image Upload (optional) -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Product Image</label>
                        <input type="file" class="form-control border-2 border-primary" name="image" accept="image/*" onchange="previewImage(event)">
                        <small class="form-text text-muted">Upload a high-quality image (JPEG, PNG). Leave empty to keep current image.</small>
                        <!-- Image Preview -->
                        <div id="image-preview-container" class="mt-2" style="display: none;">
                            <img id="image-preview" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    </div>
                </div>
                <!-- Description -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Product Description</label>
                        <textarea rows="3" name="description" class="form-control border-2 border-primary" placeholder="Provide a brief description of the product" required>{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end bg-light">
            <button type="submit" class="btn btn-primary px-4">Update</button>
        </div>
    </form>
</div>


@endsection
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('image-preview-container');
        const previewImage = document.getElementById('image-preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewContainer.style.display = 'block';
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
        }
    }
</script>
