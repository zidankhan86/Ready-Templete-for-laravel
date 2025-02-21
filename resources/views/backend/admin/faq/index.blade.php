@extends('backend.layout.app')

@section('content')
    <div class="container">
        <br>
        <h2 class="text-center">FAQ Management</h2>
        <div class="text-end">
            <a href="{{ route('faq.create') }}" class="btn btn-info me-2">+ Add FAQ</a>
        </div>
        <br><br>

        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $faq)
                                <tr>
                                    <td data-label="Question">{{ Str::limit($faq->question,20) }}</td>
                                    <td data-label="Answer">{{ Str::limit($faq->answer, 30) }}</td>
                                    <td>

                                        <div class="d-flex gap-2">
                                            <a href="{{ route('faq.edit', $faq->slug) }}" class="btn btn-warning btn-sm">
                                                <x-backend.svg.editBtn />
                                            </a>
                                            <a href="{{ route('faq.destroy', $faq->id) }}" class="btn btn-danger btn-sm">
                                                <x-backend.svg.deleteBtn />
                                            </a>
                                            <a href="{{route('faq.show',$faq->slug)}}" class="btn btn-info btn-sm">
                                                <x-backend.svg.showBtn />
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No FAQs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
