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
                       




<a class="btn text-white mb-2 bg-warning bg-gradient" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="ri-add-circle-fill"></i>Invite User
</a>  
                        <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Users</h5>
                                                <h3 class="my-3">0</h3>
                                                <p class="mb-0 text-muted text-truncate">
                                                   
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
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Active Users

</h5>
                                                <h3 class="my-3">0</h3>
                                                <p class="mb-0 text-muted text-truncate">
                                                  
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
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Admins

</h5>
                                                <h3 class="my-3">0</h3>
                                                <p class="mb-0 text-muted text-truncate">
                                                   
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
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Inactive</h5>
                                                <h3 class="my-3">0</h3>
                                                <p class="mb-0 text-muted text-truncate">
                                                  
                                                </p>
                                            </div>
                                            <div id="widget-growth" class="apex-charts" data-colors="#ffc35a,#e3e9ee"></div>
                                        </div>
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                          
                        </div> <!-- end row -->

                        <!-- Toll Charges by State/Territory Section -->








<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow-lg">

      <div class="modal-header border-0">
        <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Invite New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form>
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label fw-semibold">Job Title</label>
              <input type="text" class="form-control" placeholder="e.g., Rental Manager">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Department</label>
              <select class="form-select">
                <option selected>Management</option>
                <option>Operations</option>
                <option>Maintenance</option>
                <option>Sales</option>
                <option>Support</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Access Level</label>
              <select class="form-select">
                <option>Super Admin</option>
                <option>Manager</option>
                <option>Supervisor</option>
                <option selected>Staff</option>
                <option>Viewer</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Phone</label>
              <input type="text" class="form-control" placeholder="+61 XXX XXX XXX">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Emergency Contact</label>
              <input type="text" class="form-control" placeholder="Name & Number">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Hire Date</label>
              <input type="date" class="form-control" value="2025-11-12">
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Notes</label>
              <textarea class="form-control" rows="2" placeholder="Additional notes about this user"></textarea>
            </div>

            <div class="col-12">
              <div class="p-3 rounded-3 mt-3" style="background:#f6f9ff;">
                <p class="fw-semibold mb-2">Access Level Guide:</p>
                <p class="mb-1"><span class="text-primary fw-semibold">Super Admin:</span> Full system access</p>
                <p class="mb-1"><span class="text-primary fw-semibold">Manager:</span> Manage operations, view reports</p>
                <p class="mb-1"><span class="text-primary fw-semibold">Supervisor:</span> Day-to-day operations</p>
                <p class="mb-1"><span class="text-primary fw-semibold">Staff:</span> Basic booking & customer management</p>
                <p class="mb-0"><span class="text-primary fw-semibold">Viewer:</span> Read-only access</p>
              </div>
            </div>

          </div>
        </form>
      </div>

      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Send Invite</button>
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
