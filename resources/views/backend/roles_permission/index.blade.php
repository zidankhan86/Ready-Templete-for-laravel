@extends('backend.layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Manage Roles and Permissions</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div>
        <a href="{{route('roles.permission.create')}}" class="btn btn-info"> <x-backend.svg.addBtn/> Add Role</a><br>
    </div><br>
    <!-- Two cards side by side for Assign Role & Assign Permission -->
    <div class="row">
 <!-- Roles List Card -->
 <div class="card mb-4">
    <div class="card-header text-dark">
        <h4>Roles List</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Users</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach($role->permissions as $permission)
                                <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($role->users as $user)
                                <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">{{ $user->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

        <!-- Assign Role to User Card -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header  text-dark">
                    <h4>Assign Role to User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('assign.role') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Select User</label>
                            <select class="form-control" name="user_id" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <br><label><b>Select Role(s)</b></label>
                            <div class="form-check">
                                <br><input type="checkbox" class="form-check-input" id="selectAllRoles">
                                <label class="form-check-label" for="selectAllRoles">Select All</label><br>
                            </div>
                            <div id="rolesCheckboxes">
                                @foreach($roles as $role)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="role_name[]" value="{{ $role->name }}" id="role_{{ $role->id }}">
                                        <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-3">Assign Role</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Assign Permission to Role Card -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header text-dark">
                    <h4>Assign Permission to Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('assign.permission') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Select Role</label>
                            <select class="form-control" name="role_name" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <br><label><b>Select Permission(s)</b></label>
                            <div class="form-check">
                                <br><input type="checkbox" class="form-check-input" id="selectAllPermissions">
                                <label class="form-check-label" for="selectAllPermissions">Select All</label><br>
                            </div>
                            <div id="permissionsCheckboxes" class="row">
                                @foreach($permissions->chunk(ceil($permissions->count() / 2)) as $chunk)
                                    <div class="col-md-6">
                                        @foreach($chunk as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permission_name[]" value="{{ $permission->name }}" id="permission_{{ $permission->id }}">
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block mt-3">Assign Permission</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    // Select/Deselect all roles
    document.getElementById('selectAllRoles').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('#rolesCheckboxes input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Select/Deselect all permissions
    document.getElementById('selectAllPermissions').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('#permissionsCheckboxes input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>

@endsection
