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
                       

<a class="btn text-white mb-2 bg-danger bg-gradient" data-bs-toggle="modal" data-bs-target="#addTollModal">
                                    <i class="ri-add-circle-fill"></i> Report Incident
</a>     
                        <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Flagged Drivers</h5>
                                                <h3 class="my-3">0</h3>
                                                
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
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Financial Impact</h5>
                                                <h3 class="my-3">0</h3>
                                                
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
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">High Risk Drivers</h5>
                                                <h3 class="my-3">0</h3>
                                                
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
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Total Incidents</h5>
                                                <h3 class="my-3">0</h3>
                                               
                                            </div>
                                            <div id="widget-growth" class="apex-charts" data-colors="#ffc35a,#e3e9ee"></div>
                                        </div>
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                          
                        </div> <!-- end row -->

                        <!-- Toll Charges by State/Territory Section -->



<div class="modal fade" id="addTollModal" tabindex="-1" aria-labelledby="addTollModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addTollModalLabel">Add Toll Charge</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form id="incidentForm">
@csrf
          <div class="row g-3">
            
            <!-- Customer -->
            <div class="col-md-6">
              <label class="form-label">Customer *</label>
              <select class="form-select" id="customerSelect" name="customer_id">
    <option value="">Select Customer</option>
    @foreach($customers as $c)
        <option value="{{ $c->id }}">{{ $c->full_name }} - {{ $c->drivers_license }}</option>
    @endforeach
</select>
            </div>

            <!-- Booking -->
            <div class="col-md-6">
              <label class="form-label">Booking (Optional)</label>
              <select class="form-select" id="bookingSelect" name="booking_id">
    <option value="">Select booking</option>
</select>

            </div>

            <!-- Incident Date -->
            <div class="col-md-6">
              <label class="form-label">Incident Date *</label>
              <input type="date" class="form-control" value="2025-11-10" name="incident_date">
            </div>

            <!-- Incident Type -->
            <div class="col-md-6">
              <label class="form-label">Incident Type *</label>
              <select class="form-select" name="incident_type">
                <option selected>Late Return</option>
                <option value="Damage">Damage</option>
                <option value="Accident">Accident</option>
                <option value="Traffic Violation">Traffic Violation</option>
              </select>
            </div>

            <!-- Severity -->
            <div class="col-md-6">
              <label class="form-label">Severity *</label>
              <select class="form-select" name="severity">
                <option selected>Minor</option>
                <option value="Major">Major</option>
                <option value="Critical">Critical</option>
              </select>
            </div>

            <!-- Financial Impact -->
            <div class="col-md-6">
              <label class="form-label">Financial Impact (AUD)</label>
              <input type="number" class="form-control" name="financial_impact" value="0">
            </div>

            <!-- Reported By -->
            <div class="col-md-12">
              <label class="form-label">Reported By</label>
              <input type="text" class="form-control" name="reported_by" placeholder="Staff member name">
            </div>

            <!-- Description -->
            <div class="col-md-12">
              <label class="form-label">Description *</label>
              <textarea class="form-control" rows="3" name="description" placeholder="Detailed description of the incident"></textarea>
            </div>

            <!-- Action Taken -->
            <div class="col-md-12">
              <label class="form-label">Action Taken</label>
              <textarea class="form-control" rows="2" name="action_taken" placeholder="What action was taken in response"></textarea>
            </div>

          </div>
          <div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-success">Save Incident</button>
</div>
        </form>
      </div>

      
    </div>
  </div>
</div>
<div class="row">
                       

@if(isset($incidents) && count($incidents)>0)
@foreach($incidents as $inci)
<div class="col-md-4 col-lg-4 mb-3">
  <div class="card shadow-sm border-0" style="max-width: 360px;">
    <div class="card-body">

      <div class="d-flex align-items-center mb-3">
        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" 
             style="width:60px; height:60px;">
          <span class="fw-bold text-muted fs-5">
            {{ strtoupper(substr($inci->customer->full_name ?? 'N/A',0,2)) }}
          </span>
        </div>

        <div>
          <h5 class="card-title mb-0 fw-bold">
            {{ $inci->customer->full_name ?? 'Unknown Customer' }}
          </h5>
          <small class="text-muted">Incident: {{ $inci->incident_type }}</small>
        </div>

        <a href="#" class="ms-auto text-muted">
          <i class="bi bi-pencil"></i>
        </a>
      </div>

      <div class="mb-2">
        <i class="bi bi-calendar2-event me-2 text-muted"></i>
        <span>Date: <b>{{ $inci->incident_date }}</b></span>
      </div>

      <div class="mb-2">
        <i class="bi bi-exclamation-triangle me-2 text-muted"></i>
        <span>Severity: <b>{{ ucfirst($inci->severity) }}</b></span>
      </div>

      <div class="mb-2">
        <i class="bi bi-info-circle me-2 text-muted"></i>
        <span>{{ Str::limit($inci->description,50) }}</span>
      </div>

      <hr>

      <div class="d-flex justify-content-between">
        <div>
          <small class="text-muted d-block">Financial Impact</small>
          <span class="fw-bold fs-6 text-danger">
            ${{ $inci->financial_impact ?? 0 }}
          </span>
        </div>
        <div class="text-end">
          <small class="text-muted d-block">Reported By</small>
          <span class="fw-bold fs-6">{{ $inci->reported_by ?? 'N/A' }}</span>
        </div>
      </div>

    </div>
  </div>
</div>
@endforeach
@else
<p class="text-center text-muted">No incidents found.</p>
@endif

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Full Name *</label>
              <input type="text" class="form-control" placeholder="John Doe">
            </div>

            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="john@example.com">
            </div>

            <div class="col-md-6">
              <label class="form-label">Phone *</label>
              <input type="tel" class="form-control" placeholder="+1 (555) 000-0000">
            </div>

            <div class="col-md-6">
              <label class="form-label">Driver's License *</label>
              <input type="text" class="form-control" placeholder="DL123456">
            </div>

            <div class="col-md-6">
              <label class="form-label">License Expiry</label>
              <input type="date" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">Date of Birth</label>
              <input type="date" class="form-control">
            </div>

            <div class="col-md-6">
              <label class="form-label">City</label>
              <input type="text" class="form-control" placeholder="New York">
            </div>

            <div class="col-md-6">
              <label class="form-label">Country</label>
              <input type="text" class="form-control" placeholder="USA">
            </div>

            <div class="col-12">
              <label class="form-label">Address</label>
              <input type="text" class="form-control" placeholder="123 Main Street">
            </div>

            <div class="col-12">
              <label class="form-label">Notes</label>
              <textarea class="form-control" rows="2" placeholder="Additional customer information"></textarea>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Add Customer</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('customerSelect').addEventListener('change', function(){
    let customer_id = this.value;

    if(customer_id){
        fetch(`/get-bookings/${customer_id}`)
        .then(res => res.json())
        .then(data => {
            let bookingSelect = document.getElementById('bookingSelect');
            bookingSelect.innerHTML = "<option value=''>Select booking</option>";

            data.forEach(b => {
                bookingSelect.innerHTML += `<option value="${b.id}">Booking #${b.id} - ${b.pickup_datetime} → ${b.return_datetime}</option>`;
            });
        });
    }
});
</script>

<script>
$('#incidentForm').on('submit', function(e){
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: "{{ route('incident.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success:function(res){

            if(res.status){
                $('#addTollModal').modal('hide'); // modal close
                $('#incidentForm')[0].reset();

                // success show
                Swal.fire({
                        icon: "success",
                        title: "Completed",
                        text: "Incident add successfully",
                        timer: 1500,
                        showConfirmButton: false
                    });

                // agar list reload karni ho to
                // location.reload();
            }
        },
        error:function(err){
            console.log(err);
            Swal.fire({
                        icon: "error",
                        title: "Oops",
                        text: "Somethink went Wrong!",
                        timer: 1500,
                        showConfirmButton: false
                    });
        }
    });
});
</script>
