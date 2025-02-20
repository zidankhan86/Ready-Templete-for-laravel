@extends('backend.layout.app')
@section('content')
<div class="col-12 card">
    <form action="{{ route('home.page.update') }}" method="POST">
        @csrf
        <div class="card-body">
            <h3 class="card-title">Edit Page Content</h3>
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Homepage Title</label>
                        <input type="text" name="homepage_title" class="form-control" placeholder="Homepage Title" value="{{ old('homepage_title', $item->homepage_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Homepage Content</label>
                        <textarea name="homepage_content" id="summernote" class="form-control" rows="5" placeholder="Homepage Content" required>{{ old('homepage_content', $item->homepage_content) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">About Title</label>
                        <input type="text" name="about_title" class="form-control" placeholder="About Title" value="{{ old('about_title', $item->about_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">About Content</label>
                        <textarea name="about_content" class="form-control" rows="5" placeholder="About Content" required>{{ old('about_content', $item->about_content) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Footer Title</label>
                        <input type="text" name="footer_title" class="form-control" placeholder="Footer Title" value="{{ old('footer_title', $item->footer_title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Enter content here...',
            tabsize: 2,
            height: 200
        });
    });
</script>
@endpush
