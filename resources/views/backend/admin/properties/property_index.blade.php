
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
                                <th>Before Image</th>
                                <th>After Image</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($row as $property)
                                <tr>
                                    <td data-label="Title">{{ $property->title }}</td>
                                    <td data-label="Description">{{ Str::limit($property->description, 50) }}</td>
                                    <td data-label="Before Image">
                                        <img src="{{ asset($property->before_image) }}" width="60" alt="Before Image">
                                    </td>
                                    <td data-label="After Image">
                                        <img src="{{ asset($property->after_image) }}" width="60" alt="After Image">
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('property_edit', $property->slug) }}" class="btn btn-warning btn-sm">
                                                <x-backend.svg.editBtn />
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm">
                                                <x-backend.svg.deleteBtn />
                                            </a>
                                            <a href="{{route('property_show',$property->slug)}}" class="btn btn-info btn-sm">
                                                <x-backend.svg.showBtn />
                                            </a>
                                            {{-- <form action="{{ route('property.destroy', $property->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form> --}}
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
