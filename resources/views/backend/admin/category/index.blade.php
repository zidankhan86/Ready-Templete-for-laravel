@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 style="text-align: center">{{ $title }}</h2>
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
                                        <span class="badge {{ $category->status ? 'badge bg-green-lt' : 'badge bg-red-lt' }}">
                                            {{ $category->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-warning btn-sm">
                                                <x-backend.svg.editBtn />
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm">
                                                <x-backend.svg.deleteBtn />
                                            </a>
                                            <a href="{{route('category.show',$category->slug)}}" class="btn btn-info btn-sm">
                                                <x-backend.svg.showBtn />
                                            </a>
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
