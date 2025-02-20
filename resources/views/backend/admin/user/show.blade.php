@extends('backend.layout.app')

@section('content')
<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{$title}}</h3>
        </div>
        <div class="card-body">
            <div class="text-center mb-3">
                @if($user->image)
                    <img src="{{ asset('public/uploads/' . $user->image) }}" alt="User Image" class="img-thumbnail" style="width: 150px;">
                @else
                    <img src="{{ asset('default-avatar.png') }}" alt="User Image" class="img-thumbnail" style="width: 150px;">
                @endif
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td><span class="badge badge-sm bg-green-lt">{{ ucfirst($user->role) }}</span></td>
                </tr>

                <tr>
                    <th>Joined</th>
                    <td>{{ $user->created_at->format('d M, Y h:i A') }}</td>
                </tr>
                <tr>
                    <th>Last Updated</th>
                    <td>{{ $user->updated_at->format('d M, Y h:i A') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('user.list') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('edit.user', $user->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
