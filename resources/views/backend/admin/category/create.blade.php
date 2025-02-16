@extends('backend.layout.app')
@section('content')

<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{$title}}</h3>
        </div>
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Type Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Type Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Create Category</button>
            </div>
        </form>
    </div>
</div>


@endsection
