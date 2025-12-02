
@include('layouts.header')
@include('layouts.sidebar')
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{$page}}</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{$pagenav}}</a></li>
                                            <li class="breadcrumb-item active">{{$page}}</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">{{$page}}</h4>
                                    <a class="btn text-white mb-2 bg-success bg-gradient" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="ri-add-circle-fill"></i> Add Vehicle
</a>     
                                </div>
                                <div class="row mb-4">

    <div class="col-md-4">
        <input type="text" id="vehicleSearch" class="form-control" placeholder="Search by Make, Model, License Plate...">
    </div>

    <div class="col-md-4">
        <select id="statusFilter" class="form-control">
            <option value="">All Status</option>
            <option value="Available">Available</option>
            <option value="Rented">Rented</option>
            <option value="Maintenance">Maintenance</option>
        </select>
    </div>

    <div class="col-md-4">
        <select id="categoryFilter" class="form-select">
            <option value="">All Category</option>
            <option value="Economy">Economy</option>
            <option value="Standard">Standard</option>
            <option value="SUV">SUV</option>
            <option value="Luxury">Luxury</option>
            <option value="Van">Van</option>
            <option value="Truck">Truck</option>
        </select>
    </div>

</div>





                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" id="vehicleList">
                        
@if(isset($vehicles))
@foreach($vehicles as $v)
                        <div class="col-md-4 col-lg-4 mb-4 vehicle-item" id="vehicle-{{$v->id}}">
        <div class="card d-block shadow-sm">

            <img class="card-img-top" 
                 src="assets/images/small/photo-1555215695-3004980ad54e.jpeg" 
                 alt="Vehicle Image">

            <div class="card-body">
                <h4 class="card-title">{{$v->make}} {{$v->model}}</h4>

                <span class="fw-bold">{{$v->year}} • {{$v->license_plate}}</span><br>

                <span class="badge rounded-pill bg-success">{{$v->category}}</span>
                <span class="badge rounded-pill bg-info text-dark">{{$v->transmission}}</span>

                <hr>

                <div class="d-flex justify-content-between mb-3">
                    <span><b style="font-size:20px;color:black">${{$v->daily_rate}} / day</b></span>
                    <span><i class="ri-dashboard-2-line"></i> {{$v->mileage ?? 0}} km</span>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0);"
                       class="btn btn-outline-secondary edit-btn flex-grow-1 me-2" data-id="{{ $v->id }}">
                        <i class="ri-edit-line me-1"></i>Edit
                    </a>

                    <button class="btn btn-outline-danger delete-btn"
                            onclick="deleteVehicle({{$v->id}})">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    @endif

<!-- Button trigger modal -->


<!-- Modal -->


                            
                        </div>
                        <!-- end row -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Vehicle</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <style>
    .required-star {
        color: red;
        font-weight: bold;
    }
</style>

<form id="vehicleForm">
    @csrf

    <div class="row g-3">

        <!-- Make -->
        <div class="col-md-6">
            <label class="form-label">Make <span class="required-star">*</span></label>
            <input type="text" name="make" class="form-control">
        </div>

        <!-- Model -->
        <div class="col-md-6">
            <label class="form-label">Model <span class="required-star">*</span></label>
            <input type="text" name="model" class="form-control">
        </div>

        <!-- Year -->
        <div class="col-md-4">
            <label class="form-label">Year <span class="required-star">*</span></label>
            <input type="number" name="year" class="form-control" value="2025">
        </div>

        <!-- License Plate -->
        <div class="col-md-4">
            <label class="form-label">Registration No <span class="required-star">*</span></label>
            <input type="text" name="license_plate" class="form-control">
        </div>

        <!-- Category -->
        <div class="col-md-4">
            <label class="form-label">Category <span class="required-star">*</span></label>
            <select name="category" class="form-select">
                <option value="">Select</option>
                <option>Economy</option>
                <option>Standard</option>
                <option>SUV</option>
                <option>Luxury</option>
                <option>Van</option>
                <option>Truck</option>
            </select>
        </div>

        <!-- Color (optional) -->
        <div class="col-md-4">
            <label class="form-label">Color</label>
            <input type="text" name="color" class="form-control">
        </div>

        <!-- Mileage (optional) -->
        <div class="col-md-4">
            <label class="form-label">Mileage</label>
            <input type="number" name="mileage" class="form-control" placeholder="0">
        </div>

        <!-- Fuel Type -->
        <div class="col-md-4">
            <label class="form-label">Fuel Type <span class="required-star">*</span></label>
            <select name="fuel_type" class="form-select">
                <option>Gasoline</option>
                <option>Diesel</option>
                <option>Electric</option>
                <option>Hybrid</option>
            </select>
        </div>

        <!-- Transmission -->
        <div class="col-md-4">
            <label class="form-label">Transmission <span class="required-star">*</span></label>
            <select name="transmission" class="form-select">
                <option>Automatic</option>
                <option>Manual</option>
            </select>
        </div>

        <!-- Seats -->
        <div class="col-md-4">
            <label class="form-label">Seats <span class="required-star">*</span></label>
            <input type="number" name="seats" class="form-control" placeholder="5">
        </div>

        <!-- Miles Per Day -->
        <div class="col-md-4">
            <label class="form-label">Miles Per Day <span class="required-star">*</span></label>
            <input type="number" name="miles_per_day" class="form-control" value="150">
        </div>

        <!-- Daily Rate -->
        <div class="col-md-4">
            <label class="form-label">Daily Rate <span class="required-star">*</span></label>
            <input type="number" name="daily_rate" class="form-control" value="0">
        </div>

        <!-- Hourly Rate -->
        <div class="col-md-4">
            <label class="form-label">Hourly Rate <span class="required-star">*</span></label>
            <input type="number" name="hourly_rate" class="form-control" value="0.00">
        </div>

        <!-- Weekly Rate -->
        <div class="col-md-4">
            <label class="form-label">Weekly Rate <span class="required-star">*</span></label>
            <input type="number" name="weekly_rate" class="form-control" value="0.00">
        </div>

        <!-- Monthly Rate -->
        <div class="col-md-4">
            <label class="form-label">Monthly Rate <span class="required-star">*</span></label>
            <input type="number" name="monthly_rate" class="form-control" value="0.00">
        </div>

        <!-- Weekend Rate -->
        <div class="col-md-4">
            <label class="form-label">Weekend Rate <span class="required-star">*</span></label>
            <input type="number" name="weekend_rate" class="form-control" value="0.00">
        </div>

        <!-- Extra Mileage Charge -->
        <div class="col-md-4">
            <label class="form-label">Extra Mileage Charge</label>
            <input type="number" name="extra_mileage_charge" class="form-control" value="0.25">
        </div>

        <!-- Status -->
        <div class="col-md-6">
            <label class="form-label">Status <span class="required-star">*</span></label>
            <select name="status" class="form-select">
                <option>Available</option>
                <option>Unavailable</option>
                <option>In Service</option>
            </select>
        </div>

        <!-- Image URL (optional) -->
        <div class="col-md-6">
            <label class="form-label">Image URL</label>
            <input type="url" name="image_url" class="form-control">
        </div>

        <!-- Notes (optional) -->
        <div class="col-12">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control" rows="2"></textarea>
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-3" id="submitBtn">Save Vehicle</button>
    <button type="button" class="btn btn-success mt-3 d-none" id="updateBtn">Update Vehicle</button>

</form>


      </div>

      
    </div>
  </div>
</div>
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                @include('layouts.footer')
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                

                <!-- <script>
document.getElementById('vehicleForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let form = this;
    let submitBtn = document.getElementById("submitBtn");

    if (submitBtn.disabled) return;

    submitBtn.disabled = true;
    submitBtn.innerHTML = "Saving...";

    let formData = new FormData(form);

    fetch("{{ route('vehicles.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
    .then(async response => {

        // ---------------------- JSON SAFE FIX ----------------------
        let text = await response.text();
        let data;

        try {
            data = JSON.parse(text);
        } catch (err) {
            console.error("INVALID JSON:", text);

            Swal.fire({
                icon: "error",
                title: "Server Error",
                text: "Invalid response received!"
            });

            submitBtn.disabled = false;
            submitBtn.innerHTML = "Save Vehicle";
            return;
        }
        // ----------------------------------------------------------

        submitBtn.disabled = false;
        submitBtn.innerHTML = "Save Vehicle";

        // Validation
        if (response.status === 422) {
            let html = "";
            Object.values(data.errors).forEach(err => html += "• " + err[0] + "<br>");

            Swal.fire({
                icon: "error",
                title: "Validation Error",
                html: html
            });
            return;
        }

        // SUCCESS
        if (data.success) {

            appendVehicleCard(data.vehicle);

            Swal.fire({
                icon: "success",
                title: "Vehicle Added!",
                timer: 1500,
                showConfirmButton: false
            });

            form.reset();

            // MODAL CLOSE
            let modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
            if (modal) modal.hide();
        }

    })
    .catch(err => {
        console.error(err);

        submitBtn.disabled = false;
        submitBtn.innerHTML = "Save Vehicle";

        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Something went wrong!"
        });
    });
});
</script> -->
<script>
document.getElementById('vehicleForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let form = this;
    let submitBtn = document.getElementById("submitBtn");

    if (submitBtn.disabled) return;

    submitBtn.disabled = true;
    submitBtn.innerHTML = "Saving...";

    let formData = new FormData(form);

    fetch("{{ route('vehicles.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
    .then(async response => {

        // Read safe JSON
        let text = await response.text();
        let data;
        try {
            data = JSON.parse(text);
        } catch (err) {
            console.log("Invalid JSON:", text);
            Swal.fire({
                icon: "error",
                title: "Server Error!",
                text: "Invalid response received!"
            });
            submitBtn.disabled = false;
            submitBtn.innerHTML = "Save Vehicle";
            return;
        }

        submitBtn.disabled = false;
        submitBtn.innerHTML = "Save Vehicle";

        // Validation errors
        if (response.status === 422) {
            let html = "";
            Object.values(data.errors).forEach(err => html += "• " + err[0] + "<br>");

            Swal.fire({
                icon: "error",
                title: "Validation Error",
                html: html
            });
            return;
        }

        // SUCCESS BLOCK
        if (data.success === true) {
       
            appendVehicleCard(data.vehicle);

            Swal.fire({
                icon: "success",
                title: "Vehicle Added Successfully!",
                text: "Your vehicle has been saved.",
                timer: 2000,
                showConfirmButton: true
            });

            form.reset();

            // Close modal (Safe Method)
            const modalEl = document.getElementById('exampleModal');
            const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modal.hide();

            return;
        }

        // If no success returned
        Swal.fire({
            icon: "error",
            title: "Failed!",
            text: "Unexpected server response!"
        });

    })
    .catch(error => {
        console.error(error);
        submitBtn.disabled = false;
        submitBtn.innerHTML = "Save Vehicle";

        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Something went wrong!"
        });
    });
});
</script>
<script>
function appendVehicleCard(v) {

let img = v.image_url ? v.image_url : 'assets/images/small/photo-1555215695-3004980ad54e.jpeg';

let card = `
    <div class="col-md-4 col-lg-4 mb-4 vehicle-item" id="vehicle-${v.id}">
        <div class="card d-block shadow-sm">

            <img class="card-img-top" 
                 src="${img}" 
                 alt="Vehicle Image">

            <div class="card-body">
                <h4 class="card-title">${v.make} ${v.model}</h4>

                <span class="fw-bold">${v.year} • ${v.license_plate}</span><br>

                <span class="badge rounded-pill bg-success">${v.category}</span>
                <span class="badge rounded-pill bg-info text-dark">${v.transmission}</span>

                <hr>

                <div class="d-flex justify-content-between mb-3">
                    <span><b style="font-size:20px;color:black">$${v.daily_rate} / day</b></span>
                    <span><i class="ri-dashboard-2-line"></i> ${v.mileage ?? 0} km</span>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0);"
                       class="btn btn-outline-secondary flex-grow-1 me-2 edit-btn" data-id="${v.id}">
                        <i class="ri-edit-line me-1"></i>Edit
                    </a>

                    <button class="btn btn-outline-danger delete-btn"
                            onclick="deleteVehicle(${v.id})">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>`;

document.getElementById('vehicleList').insertAdjacentHTML('afterbegin', card);
}
</script>



<script>
    document.addEventListener('click', function(e){
    if(e.target.closest('.edit-btn')){
        let btn = e.target.closest('.edit-btn');
        let vehicleId = btn.getAttribute('data-id');

        // Fetch vehicle data from server
        fetch(`/vehicles/${vehicleId}`)
        .then(res => res.json())
        .then(data => {
            if(data.success){
                let vehicle = data.vehicle;

                // Populate the modal
                let form = document.getElementById('vehicleForm');
                form.setAttribute('data-id', vehicle.id); // store ID for update
                form.make.value = vehicle.make;
                form.model.value = vehicle.model;
                form.year.value = vehicle.year;
                form.license_plate.value = vehicle.license_plate;
                form.category.value = vehicle.category;
                form.color.value = vehicle.color || '';
                form.mileage.value = vehicle.mileage || 0;
                form.fuel_type.value = vehicle.fuel_type;
                form.transmission.value = vehicle.transmission;
                form.seats.value = vehicle.seats;
                form.miles_per_day.value = vehicle.miles_per_day;
                form.daily_rate.value = vehicle.daily_rate;
                form.hourly_rate.value = vehicle.hourly_rate;
                form.weekly_rate.value = vehicle.weekly_rate;
                form.monthly_rate.value = vehicle.monthly_rate;
                form.weekend_rate.value = vehicle.weekend_rate;
                form.extra_mileage_charge.value = vehicle.extra_mileage_charge;
                form.status.value = vehicle.status;
                form.image_url.value = vehicle.image_url || '';
                form.notes.value = vehicle.notes || '';

                // Show update button, hide submit button
                document.getElementById('submitBtn').classList.add('d-none');
                document.getElementById('updateBtn').classList.remove('d-none');

                // Open modal
                let modalEl = document.getElementById('exampleModal');
                let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.show();
            }
        });
    }
});

</script>

<script>
    document.getElementById('updateBtn').addEventListener('click', function(e){
    e.preventDefault();

    let form = document.getElementById('vehicleForm');
    let submitBtn = document.getElementById("updateBtn");
    submitBtn.disabled = true;
    submitBtn.innerHTML = "Updating...";

    let formData = new FormData(form);
    let vehicleId = form.getAttribute('data-id');

    fetch(`/vehicles/${vehicleId}`, {
        method: "POST",
        headers: { "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value },
        body: formData
    })
    .then(async response => {
        let text = await response.text();
        let data;
        try { data = JSON.parse(text); } catch(err) {
            Swal.fire({icon:"error", title:"Server Error", text:"Invalid response!"});
            submitBtn.disabled = false;
            submitBtn.innerHTML = "Update Vehicle";
            return;
        }

        submitBtn.disabled = false;
        submitBtn.innerHTML = "Update Vehicle";

        if(response.status === 422){
            let html = "";
            Object.values(data.errors).forEach(err => html += "• "+err[0]+"<br>");
            Swal.fire({icon:"error", title:"Validation Error", html:html});
            return;
        }
        if (data.success === true) {
            // Remove old card and append updated
            document.getElementById(`vehicle-${vehicleId}`).remove();
            appendVehicleCard(data.vehicle);

            Swal.fire({icon:"success", title:"Vehicle Updated!", timer:1500, showConfirmButton:false});

            // Reset form
            form.reset();
            form.removeAttribute('data-id');

            // Switch buttons
            document.getElementById('submitBtn').classList.remove('d-none');
            document.getElementById('updateBtn').classList.add('d-none');
form.reset();
            let modalEl = document.getElementById('exampleModal');
            let modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        }
    })
    .catch(err=>{
        console.error(err);
        submitBtn.disabled = false;
        submitBtn.innerHTML = "Update Vehicle";
        Swal.fire({icon:"error", title:"Error", text:"Something went wrong!"});
    });
});

</script>





<script>
function deleteVehicle(id) {

    Swal.fire({
        title: "Are you sure?",
        text: "This vehicle will be permanently deleted.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel"
    }).then((result) => {

        if (result.isConfirmed) {

            fetch(`/vehicles/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                }
            })
            .then(res => res.json())
            .then(data => {

                if (data.success) {

                    // Remove card from UI
                    document.getElementById(`vehicle-${id}`).remove();

                    Swal.fire({
                        icon: "success",
                        title: "Deleted!",
                        text: "Vehicle removed successfully.",
                        timer: 1500,
                        showConfirmButton: false
                    });
                } 
                else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Failed to delete vehicle!"
                    });
                }

            });
        }

    });

}
</script>

<script>
$('#vehicleSearch').on('keyup', function () {

    let query = $(this).val();

    $.ajax({
        url: "{{ route('vehicles.search') }}",
        type: "GET",
        data: { q: query },
        success: function (data) {
            if (data.success) {

                $("#vehicleList").html(""); // clear list

                data.vehicles.forEach(function(v) {
                    appendVehicleCard(v);  // your existing function
                });
            }
        }
    });

});


$("#statusFilter").on('change',function(){
    let query = $(this).val();

$.ajax({
    url: "{{ route('vehicles.status_search') }}",
    type: "GET",
    data: { q: query },
    success: function (data) {
console.log(data)
        if (data.success) {

            $("#vehicleList").html(""); // clear list

            data.vehicles.forEach(function(v) {
                appendVehicleCard(v);  // your existing function
            });
        }
    }
});
})


$("#categoryFilter").on('change',function(){
    let query = $(this).val();

$.ajax({
    url: "{{ route('vehicles.category_search') }}",
    type: "GET",
    data: { q: query },
    success: function (data) {
console.log(data)
        if (data.success) {

            $("#vehicleList").html(""); // clear list

            data.vehicles.forEach(function(v) {
                appendVehicleCard(v);  // your existing function
            });
        }
    }
});
})

</script>


