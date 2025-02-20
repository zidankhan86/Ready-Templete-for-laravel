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
                            <td>{{ $item->homepage_title }}</td>
                            <td>{{ $item->about_title }}</td>
                            <td>{{ $item->footer_title }}</td>
                            <td>
                                <a href="{{ route('home.page.edit') }}" class="btn btn-primary btn-sm">Edit</a>
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
