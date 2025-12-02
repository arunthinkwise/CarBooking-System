@include('layouts.header')
@include('layouts.sidebar')
<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
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
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="ri-refresh-line"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Revenue</h5>
                                                <h3 class="my-3">54,214</h3>
                                                <p class="mb-0 text-muted text-truncate">
                                                    <span class="badge bg-success me-1"><i class="ri-arrow-up-line"></i> 2,541</span>
                                                    <span>Since last month</span>  
                                                </p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div id="widget-customers" class="apex-charts" data-colors="#47ad77,#e3e9ee"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Pending</h5>
                                                <h3 class="my-3">7,543</h3>
                                                <p class="mb-0 text-muted text-truncate">
                                                    <span class="badge bg-danger me-1"><i class="ri-arrow-down-line"></i> 1.08%</span>
                                                    <span>Since last month</span>
                                                </p>
                                            </div>
                                            <div id="widget-orders" class="apex-charts" data-colors="#3e60d5,#e3e9ee"></div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Success Rate</h5>
                                                <h3 class="my-3">$9,254</h3>
                                                <p class="mb-0 text-muted text-truncate">
                                                    <span class="badge bg-danger me-1"><i class="ri-arrow-down-line"></i> 7.00%</span>
                                                    <span>Since last month</span>
                                                </p>
                                            </div>
                                            <div id="widget-revenue" class="apex-charts" data-colors="#16a7e9,#e3e9ee"></div>
                                        </div>
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Gateway Fees</h5>
                                                <h3 class="my-3">+ 20.6%</h3>
                                                <p class="mb-0 text-muted text-truncate">
                                                    <span class="badge bg-success me-1"><i class="ri-arrow-up-line"></i> 4.87%</span>
                                                    <span>Since last month</span>
                                                </p>
                                            </div>
                                            <div id="widget-growth" class="apex-charts" data-colors="#ffc35a,#e3e9ee"></div>
                                        </div>
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                          
                        </div> <!-- end row -->

                        <div class="container-fluid py-4">
  <div class="row g-4">
    <!-- Left Column -->
    <div class="col-xl-12">
      <div class="card shadow-sm">
        <div class="card-body">
          <!-- Tabs -->
          <ul class="nav nav-tabs mb-4" id="paymentTab" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button">Overview</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button">Transactions</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button">Payment Links</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button">Gateway Settings</button>
            </li>
          </ul>

          <!-- Tab Content -->
          <div class="tab-content">
            <!-- Overview -->
            <div class="tab-pane fade show active" id="overview">
              <h5 class="fw-bold mb-3">Revenue Breakdown</h5>

              <div class="p-3 mb-3 bg-success bg-opacity-10 rounded d-flex justify-content-between">
                <span class="fw-semibold text-dark">Completed Bookings</span>
                <span class="fw-bold text-success">$0</span>
              </div>

              <div class="p-3 mb-3 bg-primary bg-opacity-10 rounded d-flex justify-content-between">
                <span class="fw-semibold text-dark">Active Rentals</span>
                <span class="fw-bold text-primary">$1,165.8</span>
              </div>

              <div class="p-3 bg-warning bg-opacity-10 rounded d-flex justify-content-between">
                <span class="fw-semibold text-dark">Confirmed Bookings</span>
                <span class="fw-bold text-warning">$360</span>
              </div>
            </div>

            <!-- Transactions -->
            <div class="tab-pane fade" id="transactions">
              <p class="text-muted">No recent payments available.</p>
            </div>

            <!-- Pending -->
            <div class="tab-pane fade" id="pending">
              <p class="text-muted">No pending transactions.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div class="col-xl-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="fw-bold mb-3">By Payment Method</h5>

          <div class="p-3 mb-3 bg-light rounded d-flex justify-content-between align-items-center">
            <div>
              <span class="fw-semibold">Credit Card</span><br>
              <small class="text-muted">1 transaction</small>
            </div>
            <span class="fw-bold">$225</span>
          </div>

          <div class="p-3 mb-3 bg-light rounded d-flex justify-content-between align-items-center">
            <div>
              <span class="fw-semibold">Cash</span><br>
              <small class="text-muted">1 transaction</small>
            </div>
            <span class="fw-bold">$180</span>
          </div>

          <div class="p-3 mb-3 bg-light rounded d-flex justify-content-between align-items-center">
            <div>
              <span class="fw-semibold">Debit Card</span><br>
              <small class="text-muted">1 transaction</small>
            </div>
            <span class="fw-bold">$456</span>
          </div>

          <div class="p-3 bg-light rounded d-flex justify-content-between align-items-center">
            <div>
              <span class="fw-semibold">Bank Transfer</span><br>
              <small class="text-muted">0 transactions</small>
            </div>
            <span class="fw-bold">$0</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6">
  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="fw-bold mb-3">Transaction Status</h5>

      <!-- Successful -->
      <div class="p-3 mb-3 rounded bg-success bg-opacity-10 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <i class="bi bi-check-circle me-2 text-success"></i>
          <div>
            <span class="fw-semibold text-success">Successful</span><br>
            <small class="text-success-50 text-muted">0 transactions</small>
          </div>
        </div>
        <span class="fw-bold text-success">$0</span>
      </div>

      <!-- Failed -->
      <div class="p-3 mb-3 rounded bg-danger bg-opacity-10 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <i class="bi bi-x-circle me-2 text-danger"></i>
          <div>
            <span class="fw-semibold text-danger">Failed</span><br>
            <small class="text-muted">0 transactions</small>
          </div>
        </div>
        <span class="fw-bold text-danger">$0</span>
      </div>

      <!-- Pending -->
      <div class="p-3 mb-3 rounded bg-warning bg-opacity-25 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <i class="bi bi-clock me-2 text-warning"></i>
          <div>
            <span class="fw-semibold text-warning">Pending</span><br>
            <small class="text-muted">0 transactions</small>
          </div>
        </div>
        <span class="fw-bold text-warning">$0</span>
      </div>

      <!-- Refunded -->
      <div class="p-3 rounded bg-info bg-opacity-10 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <i class="bi bi-arrow-repeat me-2 text-primary"></i>
          <div>
            <span class="fw-semibold text-primary">Refunded</span><br>
            <small class="text-muted">0 transactions</small>
          </div>
        </div>
        <span class="fw-bold text-primary">$0</span>
      </div>
    </div>
  </div>
</div>

  </div>
</div>


                    </div>
                    <!-- container -->

                </div>
                <!-- content -->
@include('layouts.footer')
