@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{ $title }}</h3>
        </div>
        <form action="{{ route('property_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Type <span class="text-danger">*</span></label>
                    <select id="uploadType" class="form-control" required>
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                    </select>
                </div>

                <!-- Image Fields -->
                <div id="imageFields">
                    <div class="mb-3">
                        <label class="form-label">Before Image <span class="text-danger">*</span></label>
                        <input type="file" name="before_image" class="form-control" accept="image/*">
                        <small class="text-muted">Preferred image size: 800x600 pixels</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">After Image <span class="text-danger">*</span></label>
                        <input type="file" name="after_image" class="form-control" accept="image/*">
                        <small class="text-muted">Preferred image size: 800x600 pixels</small>
                    </div>
                </div>

                <!-- Video Field -->
                <div id="videoField" style="display: none;">
                    <div class="mb-3">
                        <label class="form-label">Upload Video <span class="text-danger">*</span></label>
                        <input type="file" name="video" class="form-control" accept="video/*">
                        <small class="text-muted">Preferred video format: MP4, max size: 10MB</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript to Toggle Fields -->
<script>
document.getElementById('uploadType').addEventListener('change', function () {
    let uploadType = this.value;
    let imageFields = document.getElementById('imageFields');
    let videoField = document.getElementById('videoField');

    if (uploadType === 'image') {
        imageFields.style.display = 'block';
        videoField.style.display = 'none';
    } else {
        imageFields.style.display = 'none';
        videoField.style.display = 'block';
    }
});
</script>
@endsection
