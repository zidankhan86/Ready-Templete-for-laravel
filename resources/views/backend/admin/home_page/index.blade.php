@extends('backend.layout.app')
@section('content')
<div class="container">
    <br>
    <h2 style="text-align: center">{{ $title ?? 'Home Page Contents' }}</h2>

    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>Homepage Title</th>
                            <th>About Title</th>
                            <th>Footer Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($content as $item)
                        <tr>
                            <td>{{ Str::limit($item->homepage_title,30) }}</td>
                            <td>{{ Str::limit($item->about_title,30) }}</td>
                            <td>{{ Str::limit($item->footer_title,30) }}</td>
                            <td>
                                <a href="{{ route('home.page.edit') }}" class="btn btn-primary btn-sm"><x-backend.svg.edit-btn/></a>
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
