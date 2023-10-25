<body >

    <div class="page">
      <!-- Navbar -->


      <div class="page-wrapper">
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
                <div class="col-3 d-none d-md-block border-end">
                  <div class="card-body">
                    <h4 class="subheader">Business settings</h4>
                    <div class="list-group list-group-transparent">
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center active">My Account</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">My Notifications</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Connected Apps</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Plans</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Billing & Invoices</a>
                    </div>

                    <div class="list-group list-group-transparent">
                      <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column">
                  <div class="card-body">
                    <h2 class="mb-4">My Account</h2>
                    <h3 class="card-title">Profile Details</h3>
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url(./static/avatars/000m.jpg)"></span>
                      </div>

                    </div>
                    <h3 class="card-title mt-4"> Profile</h3>
                    <div class="row g-3">
                        <form action="{{ route('registration.update',auth()->user()->id) }}" method="post">
                            @csrf
                      <div class="col-md">
                        <div class="form-label"> Name</div>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                      </div>
                      <div class="col-md">
                        <div class="form-label"> Email</div>
                        <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Mobile</div>
                        <input type="text" class="form-control"
			       value="{{ auth()->user()->phone }}" name="phone">
                      </div>
                    </div>
                    <h3 class="card-title mt-4">User Role</h3>
                    <p class="card-subtitle">You can not change the role</p>
                    <div>
                      <div class="row g-2">
                        <div class="col-auto">
                          <input type="text" class="form-control w-auto" value="{{ auth()->user()->role }}" disabled>
                        </div>

                      </div>
                    </div>
                    <h3 class="card-title mt-4">New Password</h3>

                    <div>
                      <input type="password" name="password" class="btn" placeholder=" Passowrd">
                    </div>
                  </div>
                  <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                      <a href="#" class="btn">
                        Cancel
                      </a>
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Libs JS -->

  </body>
