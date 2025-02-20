@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 style="text-align: center">{{$title}}</h2>
        <div style="text-align: right">
            <a href="{{ route('create.user') }}" class="btn btn-info" style="margin-right: 10px;">+ Add User</a>
        </div>
        <br><br>
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
                                            <div class="d-flex gap-2">
                                                <a href="{{route('edit.user',$user->id)}}" class="btn btn-warning btn-sm">
                                                    <x-backend.svg.editBtn />
                                                </a>
                                                <a href="{{ route('delete.user', $user->id) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                                     <x-backend.svg.deleteBtn />
                                                 </a>

                                                <a href="{{route('show.user',$user->id)}}" class="btn btn-info btn-sm">
                                                    <x-backend.svg.showBtn />
                                                </a>
                                            </div>
                                        </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($users->isEmpty())
                    <x-backend.svg.usernotfound-svg />
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

@endpush
