@extends('backend.layout.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{$title}}</h3>
        </div>
        <form action="{{ route('property_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Description"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Before Image</label>
                    <input type="file" name="before_image" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">After Image</label>
                    <input type="file" name="after_image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                        <select name="status" id="" class="form-control">
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
@endsection
