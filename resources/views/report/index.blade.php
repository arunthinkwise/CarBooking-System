@include('layouts.header')
@include('layouts.sidebar')

<div class="content-page">
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <div class="page-title-right">
              <form class="d-flex">
                <div class="input-group">
                  <input type="text" class="form-control shadow border-0" id="dash-daterange">
                  <span class="input-group-text bg-primary border-primary text-white">
                    <i class="ri-calendar-todo-fill fs-13"></i>
                  </span>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary ms-2">
                  <i class="ri-refresh-line"></i>
                </a>
              </form>
            </div>
            <h4 class="page-title">Reports Dashboard</h4>
          </div>
        </div>
      </div>

      <!-- ====== REPORT CARDS ====== -->
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
        <div class="col">
          <div class="card shadow-sm border-0 text-center p-4">
            <div class="mb-3">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                <i class="ri-money-dollar-circle-line fs-2"></i>
              </div>
            </div>
            <h5 class="fw-bold">Revenue Report</h5>
            <p class="text-muted mb-3">Complete revenue breakdown</p>
            <button class="btn btn-outline-primary w-100">
              <i class="ri-download-line me-1"></i> Generate
            </button>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm border-0 text-center p-4">
            <div class="mb-3">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                <i class="ri-file-list-3-line fs-2"></i>
              </div>
            </div>
            <h5 class="fw-bold">Fleet Report</h5>
            <p class="text-muted mb-3">Vehicle inventory details</p>
            <button class="btn btn-outline-primary w-100">
              <i class="ri-download-line me-1"></i> Generate
            </button>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm border-0 text-center p-4">
            <div class="mb-3">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                <i class="ri-user-line fs-2"></i>
              </div>
            </div>
            <h5 class="fw-bold">Customer Report</h5>
            <p class="text-muted mb-3">Customer database export</p>
            <button class="btn btn-outline-primary w-100">
              <i class="ri-download-line me-1"></i> Generate
            </button>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm border-0 text-center p-4">
            <div class="mb-3">
              <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                <i class="ri-file-text-line fs-2"></i>
              </div>
            </div>
            <h5 class="fw-bold">Bookings Report</h5>
            <p class="text-muted mb-3">All booking records</p>
            <button class="btn btn-outline-primary w-100">
              <i class="ri-download-line me-1"></i> Generate
            </button>
          </div>
        </div>
      </div>

      <!-- ====== SUMMARY SECTION ====== -->
      <div class="card shadow-sm border-0 mt-4">
        <div class="card-body">
          <h4 class="fw-bold mb-4">Report Summary</h4>

          <div class="row g-3">
            <div class="col-md-3">
              <div class="p-3 rounded-3 text-center" style="background:#f0f5ff;">
                <p class="fw-semibold text-primary mb-1">Total Bookings</p>
                <h3 class="mb-0 fw-bold">6</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="p-3 rounded-3 text-center" style="background:#e9f9ee;">
                <p class="fw-semibold text-success mb-1">Total Revenue</p>
                <h3 class="mb-0 fw-bold">$225</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="p-3 rounded-3 text-center" style="background:#f6edff;">
                <p class="fw-semibold text-purple mb-1">Active Customers</p>
                <h3 class="mb-0 fw-bold">3</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="p-3 rounded-3 text-center" style="background:#fff7e7;">
                <p class="fw-semibold text-warning mb-1">Fleet Size</p>
                <h3 class="mb-0 fw-bold">9</h3>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div> <!-- container -->
  </div> <!-- content -->
</div>

@include('layouts.footer')
