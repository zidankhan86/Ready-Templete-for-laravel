@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 style="text-align: center">User Table</h2>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td data-label="Name">
                                        <div class="d-flex py-1 align-items-center">
                                            <span class="avatar me-2"
                                                style="background-image: url({{ asset('uploads/profile/' . $user->profile_image) }})">
                                            </span>
                                            <div class="flex-fill">
                                                <div class="font-weight-medium">{{ $user->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Phone">{{ $user->phone }}</td>
                                    <td data-label="Email">
                                        <div class="text-muted">
                                            <a href="mailto:{{ $user->email }}" class="text-reset">
                                                {{ $user->email }}
                                            </a>
                                        </div>
                                    </td>
                                    <td data-label="Role">{{ ucfirst($user->role) }}</td>

                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="#" class="btn btn-primary">
                                                Edit
                                            </a>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($users->isEmpty())
                        <p class="text-center text-muted mt-3">No users found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
