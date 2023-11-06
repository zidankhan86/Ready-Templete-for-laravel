<div class="col-12">
    <form class="card" method="POST" action="{{ route('product') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <h3 class="card-title">Product Form</h3>
            <div class="row row-cards">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Product Name">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Price">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Select Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea rows="5" name="description" class="form-control" placeholder="Product Description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </form>
</div>
