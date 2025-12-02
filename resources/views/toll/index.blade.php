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
                        <a class="btn text-white mb-2 bg-warning bg-gradient" data-bs-toggle="modal" data-bs-target="#addTollModal">
                                    <i class="ri-file-upload-fill"></i> Import Tolls
</a>     

<a class="btn text-white mb-2 bg-success bg-gradient" data-bs-toggle="modal" data-bs-target="#addTollModal">
                                    <i class="ri-add-circle-fill"></i> Add Toll Charge
</a>     
                        <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Toll Revenue</h5>
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
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">This Month</h5>
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
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Pending Charges</h5>
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
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Unpaid Amount</h5>
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

                        <!-- Toll Charges by State/Territory Section -->
<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow-sm border-0 rounded-3">
      <div class="card-body">

        <h5 class="fw-bold mb-3">Toll Charges by State/Territory</h5>

        <!-- Search and Filter Row -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
          <div class="flex-grow-1 me-2 mb-2">
            <div class="input-group">
              <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search text-muted"></i>
              </span>
              <input type="text" class="form-control border-start-0" placeholder="Search by customer, vehicle, or location...">
            </div>
          </div>

          <div class="btn-group mb-2" role="group">
            <button type="button" class="btn btn-light active">All</button>
            <button type="button" class="btn btn-light">Pending</button>
            <button type="button" class="btn btn-light">Charged</button>
            <button type="button" class="btn btn-light">Paid</button>
            <button type="button" class="btn btn-light">Disputed</button>
          </div>
        </div>

        <!-- Empty State Box -->
        <div class="bg-white rounded-3 p-5 text-center border">
          <i class="bi bi-currency-dollar display-5 text-secondary mb-2"></i>
          <p class="text-muted mb-0">No toll charges found</p>
        </div>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addTollModal" tabindex="-1" aria-labelledby="addTollModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addTollModalLabel">Add Toll Charge</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form>
          <div class="row g-3">
            <!-- Booking -->
            <div class="col-md-12">
              <label class="form-label">Booking *</label>
              <select class="form-select">
                <option selected>Select booking</option>
                <option value="1">Booking #001</option>
                <option value="2">Booking #002</option>
              </select>
            </div>

            <!-- Toll Date -->
            <div class="col-md-6">
              <label class="form-label">Toll Date *</label>
              <input type="date" class="form-control" value="2025-11-08">
            </div>

            <!-- State/Territory -->
            <div class="col-md-6">
              <label class="form-label">State/Territory *</label>
              <select class="form-select">
                <option selected>NSW</option>
                <option value="VIC">VIC</option>
                <option value="QLD">QLD</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
                <option value="NT">NT</option>
              </select>
            </div>

            <!-- Toll Location -->
            <div class="col-md-6">
              <label class="form-label">Toll Location *</label>
              <input type="text" class="form-control" placeholder="e.g., M7 Motorway, Sydney Harbour Bridge">
            </div>

            <!-- Toll Operator -->
            <div class="col-md-6">
              <label class="form-label">Toll Operator</label>
              <select class="form-select">
                <option selected>Linkt</option>
                <option value="E-Toll">E-Toll</option>
                <option value="Roam">Roam</option>
              </select>
            </div>

            <!-- Toll Amount -->
            <div class="col-md-6">
              <label class="form-label">Toll Amount (AUD) *</label>
              <input type="number" class="form-control" value="0">
            </div>

            <!-- Admin Fee -->
            <div class="col-md-6">
              <label class="form-label">Admin Fee (AUD)</label>
              <input type="number" class="form-control" value="3.5">
            </div>

            <!-- Total Charge -->
            <div class="col-md-6">
              <label class="form-label">Total Charge (AUD)</label>
              <input type="text" class="form-control" value="3.5" readonly>
            </div>

            <!-- Status -->
            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select class="form-select">
                <option selected>Pending</option>
                <option value="Paid">Paid</option>
                <option value="Cancelled">Cancelled</option>
              </select>
            </div>

            <!-- Invoice Number -->
            <div class="col-md-12">
              <label class="form-label">Invoice Number</label>
              <input type="text" class="form-control" placeholder="Toll operator invoice #">
            </div>

            <!-- Notes -->
            <div class="col-md-12">
              <label class="form-label">Notes</label>
              <textarea class="form-control" rows="2" placeholder="Additional notes"></textarea>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Save Toll Charge</button>
      </div>
    </div>
  </div>
</div>


                    </div>
                    <!-- container -->

                </div>
                <!-- content -->
@include('layouts.footer')
