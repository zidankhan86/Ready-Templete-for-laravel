
<div class="page">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Account Settings
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">
                    <!-- Sidebar -->
                    <div class="col-md-3 d-none d-md-block border-end p-4">
                        <h2 class="text-center">My Account</h2>
                        <hr>
                        <h4 class="ms-3">Change Password</h4>
                    </div>

                    <!-- Main Content -->
                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">My Account</h2>
                            <h3 class="card-title">Profile Details</h3>

                            <form action="{{ route('update.password', auth()->user()->id) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" placeholder="Enter Old Password" value="{{ old('old_password') }}">
                                    @error('old_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" value="{{ old('new_password') }}">
                                    @error('new_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" value="{{ old('confirm_password') }}">
                                    @error('confirm_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="card-footer bg-transparent text-end mt-3">
                                    <a href="#" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

