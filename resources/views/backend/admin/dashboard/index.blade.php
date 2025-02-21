@extends('backend.layout.app')
@section('content')


 <!-- Page body -->
 <div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader"><a href="{{route('property_index')}}">Properties({{$total_properties}})</a></div>
                            <div class="ms-auto lh-1">

                            </div>
                        </div>
                        <div class="h1 mb-3"><a href="{{route('property_index')}}">{{$total_properties}}</a> </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader"><a href="{{route('products.index')}}">Service({{$total_service}})</a></div>
                            <div class="ms-auto lh-1">

                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-0 me-2"><a href="{{route('products.index')}}">{{$total_service}}</a></div>
                            <div class="me-auto">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader"><a href="{{route('category.index')}}">Categories({{$total_categories}})</a></div>
                            <div class="ms-auto lh-1">

                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-3 me-2"><a href="{{route('category.index')}}">{{$total_categories}}</a></div>
                            <div class="me-auto">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader"><a href="{{route('user.list')}}">Users({{$total_users}})</a></div>
                            <div class="ms-auto lh-1">

                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-3 me-2"><a href="{{route('user.list')}}">{{$total_users}}</a></div>
                            <div class="me-auto">

                            </div>
                        </div>




                    </div>
                </div>


            </div>

            <div class="page-body">
                <div class="container-xl">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="row row-cards">
                                @forelse ($row as $property)
                                    <div class="col-sm-6 col-lg-3"> <!-- 4 images per row -->
                                        <div class="card card-sm">
                                            <a href="#" class="d-block">
                                                <div class="diff mx-auto" id="diff-{{ $loop->index }}">
                                                    <div class="diff-item-1">
                                                        <img src="{{ asset($property->before_image) }}"
                                                            class="card-img-top" alt="Before Image">
                                                    </div>
                                                    <div class="diff-item-2">
                                                        <img src="{{ asset($property->after_image) }}"
                                                            class="card-img-top" alt="After Image">
                                                    </div>
                                                    <div class="diff-resizer"></div>
                                                </div>
                                            </a>
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="fw-bold">{{ Str::limit($property->title, 10) }}
                                                        </div>
                                                        <div class="text-secondary">
                                                            {{ Str::limit($property->description, 25) }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                <x-backend.svg.not-found-properties />
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div>

    </div>

</div>




@push('styles')
    <style>
        .diff {
            position: relative;
            width: 100%;
            height: 200px;
            /* Reduced height */
            overflow: hidden;
            user-select: none;
            border-radius: 8px;
            cursor: ew-resize;
        }

        .diff-item-1,
        .diff-item-2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .diff-item-1 img,
        .diff-item-2 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .diff-item-2 {
            width: 50%;
            overflow: hidden;
            transition: width 0.3s ease-in-out;
        }

        .diff-resizer {
            position: absolute;
            top: 0;
            left: 50%;
            width: 4px;
            height: 100%;
            background: #fff;
            cursor: ew-resize;
            transition: left 0.3s ease-in-out;
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery (Required for the script) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            let isDragging = false;
            let container, resizer, overlay;

            $(".diff").each(function() {
                let currentContainer = $(this);
                let currentResizer = currentContainer.find(".diff-resizer");
                let currentOverlay = currentContainer.find(".diff-item-2");

                // Handle mouse click & drag
                currentContainer.on("mousedown touchstart", function(e) {
                    e.preventDefault();
                    isDragging = true;
                    container = currentContainer;
                    resizer = currentResizer;
                    overlay = currentOverlay;
                });

                // Adjust slider position when moving the mouse
                $(document).on("mousemove touchmove", function(e) {
                    if (!isDragging || !container) return;

                    let pageX = e.pageX || e.originalEvent.touches[0].pageX;
                    let offsetX = pageX - container.offset().left;
                    let width = container.width();
                    let percentage = (offsetX / width) * 100;

                    if (percentage < 0) percentage = 0;
                    if (percentage > 100) percentage = 100;

                    overlay.css("width", percentage + "%");
                    resizer.css("left", percentage + "%");
                });

                // Stop dragging when mouse is released
                $(document).on("mouseup touchend", function() {
                    isDragging = false;
                    container = null;
                });

                // Adjust slider position when hovering over the image
                currentContainer.on("mousemove touchmove", function(e) {
                    if (isDragging) return;

                    let pageX = e.pageX || e.originalEvent.touches[0].pageX;
                    let offsetX = pageX - currentContainer.offset().left;
                    let width = currentContainer.width();
                    let percentage = (offsetX / width) * 100;

                    if (percentage < 0) percentage = 0;
                    if (percentage > 100) percentage = 100;

                    currentOverlay.css("width", percentage + "%");
                    currentResizer.css("left", percentage + "%");
                });
            });
        });
    </script>
@endpush


@endsection
