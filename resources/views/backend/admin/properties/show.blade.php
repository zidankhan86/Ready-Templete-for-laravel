@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 800px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Property Details</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h4><strong>Title:</strong> {{ $property->title }}</h4>
            </div>

            <div class="mb-3">
                <p><strong>Description:</strong> {{ $property->description }}</p>
            </div>

            <div class="mb-3">
                <p><strong>Status:</strong>
                    <span class="badge {{ $property->status == 1 ? 'bg-green-lt' : 'bg-red-lt' }}">
                        {{ $property->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </p>
            </div>

            <div class="row">
                <div class="col-md-6 text-center">
                    <p><strong>Before Image:</strong></p>
                    @if($property->before_image)
                        <img src="{{ asset($property->before_image) }}" class="img-fluid img-thumbnail" alt="Before Image">
                    @else
                        <p class="text-muted">No image available</p>
                    @endif
                </div>

                <div class="col-md-6 text-center">
                    <p><strong>After Image:</strong></p>
                    @if($property->after_image)
                        <img src="{{ asset($property->after_image) }}" class="img-fluid img-thumbnail" alt="After Image">
                    @else
                        <p class="text-muted">No image available</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('property_index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
