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
                       

<a class="btn text-white mb-2 bg-danger bg-gradient" data-bs-toggle="modal" data-bs-target="#reportDamageModal">
                                    <i class="ri-add-circle-fill"></i> Report Damage
</a>  


<a class="btn text-white mb-2 bg-warning bg-gradient" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="ri-add-circle-fill"></i> Shedule Service
</a>  
                        <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Records</h5>
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
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Scheduled Services

</h5>
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
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Maintenance Cost

</h5>
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
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Active Damage Reports</h5>
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



<div class="row">
                        


<div class="row gy-4">

  <!-- Card 1 -->
  <div class="col-md-4 col-lg-4">
    <div class="card border-0 shadow-sm rounded-4 p-3">
      <div class="card-body">

        <!-- Title & Status -->
        <div class="d-flex align-items-start justify-content-between mb-2">
          <div>
            <h5 class="fw-bold mb-1">Ford Explorer (SUV-1122)</h5>
            <span class="badge bg-primary-subtle text-primary text-capitalize">routine service</span>
          </div>
          <span class="badge bg-light text-primary border">scheduled</span>
        </div>

        <!-- Dates & Cost -->
        <div class="mt-3">
          <div class="d-flex align-items-center mb-1">
            <i class="bi bi-calendar3 me-2 text-muted"></i>
            <span>Service: Nov 03, 2025</span>
          </div>
          <div class="fw-bold fs-6">$0</div>
        </div>

        <!-- Description -->
        <p class="text-muted mt-2 mb-3">—</p>

        <!-- Button -->
        <button class="btn btn-outline-dark w-100">
          <i class="bi bi-pencil me-2"></i>Edit Record
        </button>
      </div>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="col-md-4 col-lg-4">
    <div class="card border-0 shadow-sm rounded-4 p-3">
      <div class="card-body">

        <div class="d-flex align-items-start justify-content-between mb-2">
          <div>
            <h5 class="fw-bold mb-1">BMW X5 (XYZ-5678)</h5>
            <span class="badge bg-primary-subtle text-primary text-capitalize">routine service</span>
          </div>
          <span class="badge bg-light text-primary border">scheduled</span>
        </div>

        <div class="mt-3">
          <div class="d-flex align-items-center mb-1">
            <i class="bi bi-calendar3 me-2 text-muted"></i>
            <span>Service: Jan 25, 2024</span>
          </div>
          <div class="fw-bold fs-6">$0</div>
        </div>

        <p class="text-muted mt-2 mb-3">Scheduled maintenance check</p>

        <button class="btn btn-outline-dark w-100">
          <i class="bi bi-pencil me-2"></i>Edit Record
        </button>
      </div>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="col-md-4 col-lg-4">
    <div class="card border-0 shadow-sm rounded-4 p-3">
      <div class="card-body">

        <div class="d-flex align-items-start justify-content-between mb-2">
          <div>
            <h5 class="fw-bold mb-1">Toyota Camry (ABC-1234)</h5>
            <span class="badge bg-purple-subtle text-purple text-capitalize">oil change</span>
          </div>
          <span class="badge bg-success-subtle text-success text-capitalize">completed</span>
        </div>

        <div class="mt-3">
          <div class="d-flex align-items-center mb-1">
            <i class="bi bi-calendar3 me-2 text-muted"></i>
            <span>Service: Jan 10, 2024</span>
          </div>
          <div class="d-flex align-items-center mb-1">
            <i class="bi bi-calendar2-event me-2 text-muted"></i>
            <span>Next: Apr 10, 2024</span>
          </div>
          <div class="fw-bold fs-6">$75</div>
        </div>

        <p class="text-muted mt-2 mb-3">Regular oil and filter change</p>

        <button class="btn btn-outline-dark w-100">
          <i class="bi bi-pencil me-2"></i>Edit Record
        </button>
      </div>
    </div>
  </div>

</div>


</div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Schedule Maintenance</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form>
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label">Vehicle *</label>
              <select class="form-select">
                <option selected disabled>Select vehicle</option>
                <option>Car A</option>
                <option>Car B</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Maintenance Type *</label>
              <select class="form-select">
                <option>Routine Service</option>
                <option>Oil Change</option>
                <option>Brake Check</option>
                <option>Other</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Service Date *</label>
              <input type="date" class="form-control" value="2025-11-10">
            </div>

            <div class="col-md-6">
              <label class="form-label">Next Service Date</label>
              <input type="date" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Mileage</label>
              <input type="number" class="form-control" placeholder="0">
            </div>

            <div class="col-md-6">
              <label class="form-label">Cost ($)</label>
              <input type="number" class="form-control" placeholder="0">
            </div>

            <div class="col-md-6">
              <label class="form-label">Service Provider</label>
              <input type="text" class="form-control" placeholder="Shop name">
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select class="form-select">
                <option>Scheduled</option>
                <option>In Progress</option>
                <option>Completed</option>
                <option>Cancelled</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label">Description</label>
              <textarea class="form-control" rows="2" placeholder="Service details"></textarea>
            </div>

            <div class="col-12">
              <label class="form-label">Notes</label>
              <textarea class="form-control" rows="2" placeholder="Additional notes"></textarea>
            </div>

          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save Maintenance</button>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="reportDamageModal" tabindex="-1" aria-labelledby="reportDamageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger d-flex align-items-center" id="reportDamageModalLabel">
          <i class="bi bi-exclamation-triangle-fill me-2"></i> Report Vehicle Damage
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="reportDamageForm">
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label">Vehicle *</label>
              <select class="form-select" name="vehicle">
                <option selected disabled>Select vehicle</option>
                <option>Car A</option>
                <option>Car B</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Report Date *</label>
              <input type="date" class="form-control" name="report_date" value="2025-11-10">
            </div>

            <div class="col-md-6">
              <label class="form-label">Damage Type *</label>
              <select class="form-select" name="damage_type">
                <option>Minor Scratch</option>
                <option>Dent</option>
                <option>Broken Light</option>
                <option>Glass Crack</option>
                <option>Other</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Severity *</label>
              <select class="form-select" name="severity">
                <option>Minor</option>
                <option>Moderate</option>
                <option>Severe</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Location on Vehicle</label>
              <input type="text" class="form-control" name="location" placeholder="e.g., Front bumper, Driver side door">
            </div>

            <div class="col-md-6">
              <label class="form-label">Estimated Repair Cost ($)</label>
              <input type="number" class="form-control" name="estimated_cost" placeholder="0" value="0">
            </div>

            <div class="col-md-6">
              <label class="form-label">Reported By</label>
              <input type="text" class="form-control" name="reported_by" placeholder="Name">
            </div>

            <div class="col-12">
              <label class="form-label">Description *</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Detailed description of the damage"></textarea>
            </div>

          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Submit Report</button>
      </div>

    </div>
  </div>
</div>




                            
                        </div>
                        <!-- end row -->


                    </div>
                    <!-- container -->

                </div>
                <!-- content -->
@include('layouts.footer')
