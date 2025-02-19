@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 class="text-center">FAQ Details</h2>
        <div class="col-12 d-flex justify-content-center">
            <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
                <div class="card-header">
                    <h3 class="card-title mb-0">FAQ Information</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Question:</strong>
                        <p>{{ $faq->question }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Answer:</strong>
                        <p>{{ $faq->answer }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Status:</strong>
                        <p class="{{ $faq->status ? 'text-success' : 'text-danger' }}">
                            {{ $faq->status ? 'Active' : 'Inactive' }}
                        </p>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('faq.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('faq.edit', $faq->slug) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
