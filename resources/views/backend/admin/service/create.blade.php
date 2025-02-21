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
                    <label class="form-label">Service Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Service name" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter Service description" required></textarea>
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

                <!-- Thumbnail -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Service Thumbnail</label>
                    <input type="file" class="form-control" name="image" accept="image/*" required>
                    <small class="form-text text-muted">Upload a high-quality image (JPEG, PNG).</small>
                </div>

                <!-- Images -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Service Images</label>
                    <input type="file" class="form-control" name="images[]" accept="image/jpeg,image/png" multiple required>
                    <small class="form-text text-muted">Upload high-quality images (JPEG, PNG).</small>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <!-- Steps Section -->
            <div class="mb-3">
                <label class="form-label fw-bold">Steps</label>
                <div id="steps-container">
                    <!-- Initial Step Input -->
                    <div class="step-input mb-2 d-flex align-items-center gap-2">
                        <input type="text" class="form-control" name="steps[]" placeholder="Enter step description" required>
                        <button type="button" id="add-step" class="btn btn-secondary">+ Add</button>
                    </div>
                </div>

            </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the "Add Step" button and steps container
        const addStepButton = document.getElementById('add-step');
        const stepsContainer = document.getElementById('steps-container');

        // Add event listener to the "Add Step" button
        addStepButton.addEventListener('click', function () {
            // Create a new input element for the step
            const newStepInput = document.createElement('div');
            newStepInput.classList.add('step-input', 'mb-2');
            newStepInput.innerHTML = `
                <input type="text" class="form-control" name="steps[]" placeholder="Enter step description" required>
                <button type="button" class="btn btn-danger mt-2 remove-step">Remove</button>
            `;

            // Append the new input to the steps container
            stepsContainer.appendChild(newStepInput);

            // Add event listener to the "Remove" button
            const removeButton = newStepInput.querySelector('.remove-step');
            removeButton.addEventListener('click', function () {
                stepsContainer.removeChild(newStepInput);
            });
        });
    });
</script>
@endpush
