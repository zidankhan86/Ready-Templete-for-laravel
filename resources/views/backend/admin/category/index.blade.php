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
                                    <td data-label="Name">{{ $category->name }}</td>
                                    <td data-label="Status">
                                        @if($category->status)
                                            <span class="badge bg-green-lt">Active</span>
                                        @else
                                            <span class="badge bg-red-lt">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            {{-- <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a> --}}
                                            <a href="{{route('category.destroy', $category->id)}}">delete</a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                              <strong class="text-center">  No categories found.</strong>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
