@extends('backend.layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Manage Roles</h2>

    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-dark">
                    <h4 class="text-center">Create Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.roles') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="roleName">Role Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Create Role</button>
                        <a href="{{ url()->previous() }}" class="btn btn-dark btn-block mt-3">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
