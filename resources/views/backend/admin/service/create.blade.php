@extends('backend.layout.app')
@section('content')

<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{$title}}</h3>
        </div>
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- Product Name -->
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter product description" required></textarea>
                </div>


                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Product Thumbnail</label>
                    <input type="file" class="form-control" name="image" accept="image/*" required>
                    <small class="form-text text-muted">Upload a high-quality image (JPEG, PNG).</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Product Images</label>
                    <input type="file" class="form-control" name="images[]" accept="image/jpeg,image/png" multiple required>
                    <small class="form-text text-muted">Upload high-quality images (JPEG, PNG).</small>
                </div>

                      <!-- Status -->
                      <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0" selected>Inactive</option>
                        </select>
                    </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>
        </form>
    </div>
</div>


@endsection

