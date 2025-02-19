@extends('backend.layout.app')

@section('content')

<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">{{ isset($faq) ? 'Edit FAQ' : 'Create FAQ' }}</h3>
        </div>
        <form action="{{ isset($faq) ? route('faq.update', $faq->id) : route('faq.store') }}" method="POST">
            @csrf
            @isset($faq)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Question</label>
                    <input type="text" class="form-control" id="question" name="question" value="{{ old('question', $faq->question ?? '') }}" placeholder="Enter Question" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Answer</label>
                    <textarea class="form-control" name="answer" rows="4" placeholder="Enter Answer" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ isset($faq) && $faq->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ isset($faq) && $faq->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">{{ isset($faq) ? 'Update FAQ' : 'Create FAQ' }}</button>
            </div>
        </form>
    </div>
</div>



@endsection
