@extends('backend.layout.app')
@section('content')
<div class="container">
    <br>
    <h2 style="text-align: center">Custom Page</h2>

    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                <tr>
                    <th>Title</th>
                    <th>Meta Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ Str::limit($item->title,20) }}</td>
                    <td>{{ Str::limit($item->meta_title,20) }} </td>
                    <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('custom.page.edit', $item->id) }}" class="btn btn-primary btn-sm"><x-backend.svg.editBtn /></a>
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


