@extends('backend.layout.app')

@section('content')
<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Edit Product</h3>
        </div>
        <form action="{{ route('property_update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $product->title) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Before Image</label>
                    <input type="file" name="before_image" class="form-control">
                    @if($product->before_image)
                        <img src="{{ asset('uploads/property/' . $product->before_image) }}" alt="Before Image" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">After Image</label>
                    <input type="file" name="after_image" class="form-control">
                    @if($product->after_image)
                        <img src="{{ asset('uploads/property/' . $product->after_image) }}" alt="After Image" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('property_index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
