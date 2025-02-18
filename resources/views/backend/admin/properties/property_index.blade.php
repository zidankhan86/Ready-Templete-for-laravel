@extends('backend.layout.app')
@section('content')
    <div class="container">
        <br>
        <h2 style="text-align: center">{{$title}}</h2>
        <div style="text-align: right">
            <a href="{{ route('property_create') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Property</a>
        </div>
        <br><br>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                @if($row->some(fn($p) => $p->before_video || $p->after_video))
                                    <th>Video</th>
                                @endif
                                @if($row->some(fn($p) => $p->before_image || $p->after_image))
                                    <th>Image</th>
                                @endif
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($row as $property)
                                <tr>
                                    <td data-label="Title">{{ $property->title }}</td>
                                    <td data-label="Description">{{ Str::limit($property->description, 50) }}</td>

                                    @if($property->video)
                                        <td data-label="Video">
                                            @if($property->video)
                                                <video width="60" controls>
                                                    <source src="{{ asset($property->before_video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                            @if($property->after_video)
                                                <video width="60" controls>
                                                    <source src="{{ asset($property->after_video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </td>
                                    @endif

                                    @if($property->before_image || $property->after_image)
                                        <td data-label="Image">
                                            @if($property->before_image)
                                                <img src="{{ asset($property->before_image) }}" width="60" alt="Before Image">
                                            @endif
                                            @if($property->after_image)
                                                <img src="{{ asset($property->after_image) }}" width="60" alt="After Image">
                                            @endif
                                        </td>
                                    @endif

                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('property_edit', $property->slug) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <x-backend.svg.editBtn />
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <x-backend.svg.deleteBtn />
                                            </a>
                                            <a href="{{ route('property_show', $property->slug) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show">
                                                <x-backend.svg.showBtn />
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
