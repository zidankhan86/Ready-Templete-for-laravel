@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 style="text-align: center">{{$title}}</h2>
        <div style="text-align: right">
            <a href="{{ route('category.create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Category</a>
        </div><br><br>

        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <span class="badge {{ $category->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $category->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="" class="btn btn-danger btn-sm">show</a>
                                    </div>
                                </td>
                            </tr>

                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                    <x-backend.svg.notfound-svg />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
