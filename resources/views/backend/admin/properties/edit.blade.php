@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Edit Property</h3>
        </div>
        <form action="{{ route('property_update', $property->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $property->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Description">{{ old('description', $property->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Before Image</label>
                    <input type="file" name="before_image" class="form-control">
                    @if($property->before_image)
                        <img src="{{ asset($property->before_image) }}" alt="Before Image" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">After Image</label>
                    <input type="file" name="after_image" class="form-control">
                    @if($property->after_image)
                        <img src="{{ asset($property->after_image) }}" alt="After Image" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $property->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $property->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('property_index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
