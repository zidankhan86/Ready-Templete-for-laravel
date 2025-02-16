@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 class="text-center">Category Details</h2>
        <div class="card">
            <div class="card-body">
                <h4><strong>Name:</strong> {{ $category->name }}</h4>
                <p><strong>Status:</strong>
                    <span class="badge {{ $category->status ? 'bg-green-lt' : 'bg-red-lt' }}">
                        {{ $category->status ? 'Active' : 'Inactive' }}
                    </span>
                </p>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
