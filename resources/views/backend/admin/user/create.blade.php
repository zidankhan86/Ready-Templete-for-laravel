@extends('backend.layout.app')

@section('content')
<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{ isset($user) ? 'Edit User' : 'Create User' }}</h3>
        </div>
        <form action="{{ isset($user) ? route('update.user', $user->id) : route('store.user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Enter Name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Enter Email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone ?? '') }}" placeholder="Enter Phone" required>
                </div>

                @if(!isset($user))
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-control" name="role">
                        <option value="customer" {{ isset($user) && $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ isset($user) && $user->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ isset($user) && $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" class="form-control" name="image">
                    @if(isset($user) && $user->image)
                        <img src="{{ asset('storage/uploads/' . $user->image) }}" alt="User Image" class="img-thumbnail mt-2" style="width: 100px;">
                    @endif
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update User' : 'Create User' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
