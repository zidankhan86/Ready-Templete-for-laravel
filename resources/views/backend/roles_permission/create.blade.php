
@extends('backend.layout.app')

@section('content')
<div class="container mt-5">
    <h2>Manage Roles and Permissions</h2>
 <!-- Two cards side by side for Create Role & Create Permission -->
 <div class="row">
    <!-- Create Role Card -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header text-dark">
                <h4>Create Role</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('store.roles') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="roleName">Role Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Create Role</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Create Permission Card -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header text-dark">
                <h4>Create Permission</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="permissionName">Permission Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Create Permission</button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
