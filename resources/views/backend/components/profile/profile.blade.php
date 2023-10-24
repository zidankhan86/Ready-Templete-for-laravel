<div class="page-wrapper">
    <div class="page-header">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="avatar avatar-lg rounded" style="background-image: url(./static/avatars/003m.jpg)"></span>
          </div>
          <div class="col">
            <h1 class="fw-bold">{{ auth()->user()->name }}</h1>


          </div>
          <div class="col-auto ms-auto">

          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row g-3">
          <div class="col">
            <ul class="timeline">
              <li class="timeline-event">

                <div class="card timeline-event-card">
                  <div class="card-body">
                    <div class="text-muted float-end"></div>
                    <h4>Name</h4>
                    <p class="text-muted">{{ auth()->user()->name }}</p>
                  </div>
                </div>
              </li>
              <li class="timeline-event">

                <div class="card timeline-event-card">
                  <div class="card-body">
                    <div class="text-muted float-end"></div>
                    <h4>Email</h4>
                    <p class="text-muted">{{ auth()->user()->email }}</p>
                  </div>
                </div>
              </li>
              <li class="timeline-event">

                <div class="card timeline-event-card">
                  <div class="card-body">
                    <div class="text-muted float-end"></div>
                    <h4>Mobile</h4>
                    <p class="text-muted">{{ auth()->user()->phone }} </p>
                  </div>
                </div>
              </li>
              <li class="timeline-event">

                <div class="card timeline-event-card">
                  <div class="card-body">
                    <div class="text-muted float-end"></div>
                    <h4>User Role</h4>
                    <p class="text-muted">{{ auth()->user()->role }}</p>
                  </div>
                </div>
              </li>



            </ul>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->


