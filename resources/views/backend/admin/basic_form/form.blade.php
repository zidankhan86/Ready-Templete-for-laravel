<div class="col-12 d-flex justify-content-center mt-4">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-header">
            <h3 class="card-title mb-0">Category Form</h3>
        </div>
        <form id="categoryForm">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Type Name</label>
                    <input type="text" class="form-control" id="typeName" placeholder="Type Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" id="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="Slug">
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Create Category</button>
            </div>
        </form>
    </div>
</div>
