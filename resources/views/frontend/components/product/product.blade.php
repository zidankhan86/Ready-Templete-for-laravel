<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center fw-bold mb-4">Our Products</h2>

        <!-- Search Bar -->
        <div class="mb-4">
            <form method="GET" action="{{ route('product.page') }}" class="d-flex justify-content-center">
                <input type="text"
                       class="form-control me-2 w-50 shadow-sm"
                       name="query"
                       placeholder="Search for products..."
                       value="{{ request('query') }}">
                <button type="submit" class="btn btn-dark">
                    <i class="bi-search"></i> Search
                </button>
            </form>
        </div>


        <!-- Product Grid -->
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $item)
                <div class="col mb-5">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Product image-->
                        <div class="product-image-container">
                            <img class="card-img-top" src="{{ url('/public/uploads/', $item->image) }}" alt="{{ $item->name }}" />
                        </div>
                        <!-- Product details-->
                        <div class="card-body p-4 text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder text-truncate" title="{{ $item->name }}">{{ $item->name }}</h5>
                            <!-- Product price-->
                            <p class="text-success fs-5 mb-1">BDT {{ number_format($item->price, 2) }}</p>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-dark w-100" href="{{ route('cart.add', $item->id) }}">
                                    <i class="bi-cart-fill me-1"></i> Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .product-image-container {
        overflow: hidden;
        position: relative;
    }

    .product-image-container img {
        transition: transform 0.3s ease, opacity 0.3s ease;
        max-height: 250px;
        object-fit: cover;
    }

    .product-image-container:hover img {
        transform: scale(1.1);
        opacity: 0.9;
    }

    .card {
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-dark {
        background-color: #333;
        border-color: #333;
    }

    .btn-dark:hover {
        background-color: #555;
        border-color: #555;
    }

    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 30px;
        padding: 10px 20px;
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        border-color: #333;
    }

    .btn-dark {
        border-radius: 30px;
    }
</style>
