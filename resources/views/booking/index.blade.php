
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
                                    <i class="ri-add-circle-fill"></i> New Booking
</a>     
                                </div>
                                <div class="row mb-4">

    <div class="col-md-4">
        <input type="text" id="bookingSearch" class="form-control" placeholder="Search by Customer, Booking, Vehicle...">
    </div>

    <div class="col-md-4">
        <select id="statusFilter" class="form-control">
            <option value="">All Status</option>
            <option value="peding">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="active">Active</option>
            <option value="compeleted">Compeleted</option>
        </select>
    </div>


</div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" id="bookingsContainer">
  <!-- Simple card -->
  @if(isset($bookings))
@foreach($bookings as $b)
    <div class="col-md-4 col-lg-4 booking-card" id="booking-card-{{ $b->id }}">
        <div class="card d-block">
            <div class="card-body">

                <h4 class="card-title">{{ $b->customer->full_name ?? 'No Name' }}</h4>

                <span class="fw-bold">#BK-{{ $b->id }}</span><br>

                <span class="badge rounded-pill bg-success">{{ $b->status }}</span>

                <div class="mb-3 mt-2">
                    <span>
                        <i class="ri-car-line"></i>
                        {{ $b->vehicle ? $b->vehicle->make.' '.$b->vehicle->model.' ('.$b->vehicle->license_plate.')' : '' }}
                    </span><br>

                    <span>
                        <i class="ri-calendar-line"></i>
                        {{ \Carbon\Carbon::parse($b->pickup_datetime)->format('d M Y') }}
                        -
                        {{ \Carbon\Carbon::parse($b->return_datetime)->format('d M Y') }}
                    </span>
                </div>

                <hr>

                <div class="mb-3 mt-2">
                    <span class="text-black"><b>Total Amount</b></span><br>
                    <span>${{ number_format($b->grand_total, 2) }}</span>
                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="javascript:void(0);"
                       class="btn btn-outline-secondary edit-booking flex-grow-1 me-2 d-flex align-items-center justify-content-center"
                       data-id="{{ $b->id }}" style="border-radius: 10px;">
                        <i class="ri-edit-line"></i> Edit
                    </a>

                    <a href="javascript:void(0);"
                       class="btn btn-outline-danger delete-booking d-flex align-items-center justify-content-center"
                       data-id="{{ $b->id }}" style="border-radius: 10px;">
                        <i class="ri-delete-bin-line"></i> Delete
                    </a>

                </div>

            </div>
        </div>
    </div>
@endforeach
@endif



<!-- Bootstrap Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Booking</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="row">
          <!-- Left Column -->
          <div class="col-md-7 border-end">
            <form id="bookingForm">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Customer *</label>
                  <select class="form-select" name="customer_id">
    <option selected disabled>Select Customer</option>
    @foreach($customers as $customer)
        <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
    @endforeach
</select>

                </div>
                <div class="col-md-6">
                  <label class="form-label">Vehicle *</label>
                  <select id="vehicleRate" name="vehicle_id" class="form-select">
    <option selected disabled>Select Vehicle</option>
    @foreach($vehicles as $v)
        <option 
            value="{{ $v->id }}" 
            data-daily="{{ $v->daily_rate }}"
            data-weekly="{{ $v->weekly_rate }}"
            data-monthly="{{ $v->monthly_rate }}"
            data-mileage="{{ $v->extra_mileage_charge }}"
        >
            {{ $v->make }} {{ $v->model }} ({{ $v->license_plate }})
        </option>
    @endforeach
</select>


                </div>

                <div class="col-md-6">
                  <label class="form-label">Pickup Date & Time *</label>
                  <input type="datetime-local" class="form-control" value="2025-11-08T11:58" name="pickup_datetime">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Return Date & Time *</label>
                  <input type="datetime-local" class="form-control" value="2025-11-14T11:58" name="return_datetime">
                </div>

                <div class="col-md-6">
                  <label class="form-label">Pickup Location</label>
                  <input type="text" class="form-control" placeholder="Address or branch" name="pickup_location">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Return Location</label>
                  <input type="text" class="form-control" placeholder="Same or different location" name="return_location">
                </div>

                <div class="col-md-6">
                  <label class="form-label">Security Deposit ($)</label>
                  <input type="number" class="form-control" value="200" name="security_deposit">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Booking Status</label>
                  <select class="form-select" name="status">
                    <option>Active</option>
                    <option>Pending</option>
                    <option>Confirmed</option>
                    <option>Compeleted</option>
                    <option>Cancelled</option>
                   
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label">Booking Notes</label>
                  <textarea class="form-control" rows="2" placeholder="Write notes..." name="notes"></textarea>
                </div>
              </div>
            
          </div>

          <!-- Right Column -->
          <div class="col-md-5">
            <div class="p-3">
              <h5 class="mb-3 fw-semibold">Price Calculator</h5>

              <div class="mb-3">
                <label class="form-label">Rental Duration Type</label>
                <select id="rentalType" class="form-select" name="rental_type">
                  
                </select>
              </div>

              <!-- Mileage -->
              <input type="hidden" name="mileage_package" id="mileage_package_hidden" value="limited">
              <input type="hidden" name="base_rate" id="baseRateHidden">
<input type="hidden" name="addons_total" id="addonsHidden">
<input type="hidden" name="grand_total" id="grandTotalHidden">

              <label class="form-label d-block">Mileage Package</label>
              <div class="d-flex mb-3">
                <div id="limitedMileage" class="border rounded p-2 flex-fill me-2 text-center bg-light selectable active" data-value="0">
                  <strong>Limited</strong><br>150 mi/day<br><small>+$0.25/extra mi</small>
                </div>
                <div id="unlimitedMileage" class="border rounded p-2 flex-fill text-center selectable" data-value="15">
                  <strong>Unlimited</strong><br>Unlimited miles<br><small>+$15/day</small>
                </div>
              </div>

              <!-- Add-ons -->
              <div class="mb-3">
                <label class="form-label">Optional Add-ons</label>
                <div class="form-check">
                  <input class="form-check-input addon" type="checkbox" data-rate="25" id="premiumInsurance" name="premiumInsurance" checked>
                  <label class="form-check-label" for="premiumInsurance">Premium Insurance (+$25/day)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input addon" type="checkbox" data-rate="10" id="gpsNavigation" name="gpsNavigation">
                  <label class="form-check-label" for="gpsNavigation">GPS Navigation (+$10/day)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input addon" type="checkbox" data-rate="8" id="childSeat" name="childSeat">
                  <label class="form-check-label" for="childSeat">Child Safety Seat (+$8/day)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input addon" type="checkbox" data-rate="12" id="additionalDriver" name="additionalDriver">
                  <label class="form-check-label" for="additionalDriver">Additional Driver (+$12/day)</label>
                </div>
              </div>

              <!-- Special Circumstances -->
              <label class="form-label d-block">Special Circumstances</label>
              <div class="form-check">
                <input class="form-check-input extra" type="checkbox" data-rate="35" id="airportPickup" name="airportPickup">
                <label class="form-check-label" for="airportPickup">Airport Pickup/Return (+$35)</label>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input extra" type="checkbox" data-rate="75" id="oneWayRental" name="oneWayRental">
                <label class="form-check-label" for="oneWayRental">One-Way Rental (+$75)</label>
              </div>

              <!-- Price Breakdown -->
              <div class="border-top pt-3 mt-3">
                <h6>Price Breakdown</h6>
                <div id="priceDetails"></div>
                <div class="d-flex justify-content-between border-top mt-2 pt-2 fw-bold text-dark fs-5">
                  <span>Total</span><span id="totalAmount">$0.00</span>
                </div>
                <small class="text-muted d-block mt-2">Includes 150 miles. Extra miles charged at $0.25/mile.</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" id="bookingSubmitBtn">Create Booking</button>
      </div>

      </form>
    </div>
  </div>
</div>




                            
                        </div>
                        <!-- end row -->

                        
                    </div> <!-- container -->

                </div> <!-- content -->
                @include('layouts.footer')

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>





document.addEventListener("DOMContentLoaded", function() {
  const rentalType = document.getElementById("rentalType");
  const addons = document.querySelectorAll(".addon");
  const extras = document.querySelectorAll(".extra");
  const limited = document.getElementById("limitedMileage");
  const unlimited = document.getElementById("unlimitedMileage");
  const totalAmount = document.getElementById("totalAmount");
  const priceDetails = document.getElementById("priceDetails");
  const vehicleRate = document.getElementById("vehicleRate");

  let selectedMileage = 0;

  // Handle mileage selection
  [limited, unlimited].forEach(el => {
    el.addEventListener("click", function() {
      [limited, unlimited].forEach(e => e.classList.remove("bg-light", "active"));
      el.classList.add("bg-light", "active");
      selectedMileage = parseFloat(el.dataset.value);
      calculateTotal();
    });
  });

  // Event Listeners
  rentalType.addEventListener("change", calculateTotal);
  vehicleRate.addEventListener("change", calculateTotal);
  addons.forEach(a => a.addEventListener("change", calculateTotal));
  extras.forEach(e => e.addEventListener("change", calculateTotal));

  function calculateTotal() {
    let duration = rentalType.value;
    let days = 1;

    // --------------------------
    // VEHICLE SELECTED RATES
    // --------------------------
    let selected = vehicleRate.selectedOptions[0];
    let daily   = parseFloat(selected.dataset.daily);
    let weekly  = parseFloat(selected.dataset.weekly);
    let monthly = parseFloat(selected.dataset.monthly);

    // --------------------------
    // SET BASE RATE DYNAMICALLY
    // --------------------------
    let baseRate = 0;

    if (duration === "daily") {
        baseRate = daily;
        days = 1;
    }
    if (duration === "weekly") {
        baseRate = weekly;
        days = 7;
    }
    if (duration === "monthly") {
        baseRate = monthly;
        days = 30;
    }

    let addonTotal = 0;
    addons.forEach(a => {
      if (a.checked) addonTotal += parseFloat(a.dataset.rate) * days;
    });

    let extraTotal = 0;
    extras.forEach(e => {
      if (e.checked) extraTotal += parseFloat(e.dataset.rate);
    });

    let mileageTotal = selectedMileage > 0 ? selectedMileage * days : 0;
    let subtotal = baseRate + addonTotal + extraTotal + mileageTotal;
    let tax = subtotal * 0.08;
    let total = subtotal + tax;

    // Update UI
    priceDetails.innerHTML = `
      <div class="d-flex justify-content-between"><span>Base Rate</span><span>$${baseRate.toFixed(2)}</span></div>
      <div class="d-flex justify-content-between"><span>Add-ons</span><span>$${addonTotal.toFixed(2)}</span></div>
      <div class="d-flex justify-content-between"><span>Mileage Package</span><span>$${mileageTotal.toFixed(2)}</span></div>
      <div class="d-flex justify-content-between"><span>Extras</span><span>$${extraTotal.toFixed(2)}</span></div>
      <div class="d-flex justify-content-between"><span>Tax (8%)</span><span>$${tax.toFixed(2)}</span></div>
    `;
    totalAmount.innerText = `$${total.toFixed(2)}`;

    document.getElementById('baseRateHidden').value = baseRate.toFixed(2);
    document.getElementById('grandTotalHidden').value = total.toFixed(2);
    document.getElementById('addonsHidden').value = addonTotal.toFixed(2);

  }

  calculateTotal(); // initialize
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    const rentalType = document.getElementById("rentalType");
    const vehicleRate = document.getElementById("vehicleRate");

    // When vehicle changes → update rentalType price options
    vehicleRate.addEventListener("change", function() {

        let daily  = this.selectedOptions[0].dataset.daily;
        let weekly = this.selectedOptions[0].dataset.weekly;
        let monthly = this.selectedOptions[0].dataset.monthly;

        // Update rental type dropdown text
        rentalType.innerHTML = `
            <option value="daily">Daily ($${daily}/day)</option>
            <option value="weekly">Weekly ($${weekly}/week)</option>
            <option value="monthly">Monthly ($${monthly}/month)</option>
        `;

        calculateTotal(); // re-calculate total after vehicle change
    });

});
</script>

<meta name="csrf-token" content="{{ csrf_token() }}" />

<script>
document.addEventListener('DOMContentLoaded', function(){

  // Helpers
  function showSuccess(msg){
    Swal.fire({ icon: 'success', title: 'Success', text: msg, timer: 2000, showConfirmButton:false });
  }
  function showError(msg){
    Swal.fire({ icon: 'error', title: 'Error', text: msg });
  }

  // Grab form & elements
  const bookingForm = document.getElementById('bookingForm');
  const bookingsContainer = document.getElementById('bookingsContainer');
  const modalEl = document.getElementById('exampleModal');
  const createModal = new bootstrap.Modal(modalEl);

  // CSRF token for fetch
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  // Serialize form to object
  function formToObj(form){
    const data = new FormData(form);
    const obj = {};
    for (let [k,v] of data.entries()){
      // checkbox boolean handling: HTML checkboxes that are unchecked are not included, so we'll handle separately
      obj[k] = v;
    }
    // handle checkboxes manually
    ['premium_insurance','gps','child_seat','additional_driver','airport_pickup','one_way_rental'].forEach(name=>{
      const el = form.querySelector(`[name="${name}"]`);
      obj[name] = el ? (el.checked ? 1 : 0) : 0;
    });
    // include base_rate, addons_total, grand_total from your UI (if inputs present)
    const baseRateEl = document.querySelector('[name="base_rate"]') || document.getElementById('baseRateHidden');
    const addonsEl = document.querySelector('[name="addons_total"]') || document.getElementById('addonsHidden');
    const grandEl = document.querySelector('[name="grand_total"]') || document.getElementById('grandTotalHidden');
    obj.base_rate = baseRateEl ? baseRateEl.value : document.getElementById('totalAmount').innerText.replace(/[^0-9.-]+/g,"");
    obj.addons_total = addonsEl ? addonsEl.value : 0;
    obj.grand_total = grandEl ? grandEl.value : document.getElementById('totalAmount').innerText.replace(/[^0-9.-]+/g,"");

    return obj;
  }

  // Build card HTML (same structure as _card partial)
  function buildCardHTML(b){
    const startDate = new Date(b.pickup_datetime);
    const endDate = new Date(b.return_datetime);
    return `
    <div class="col-md-4 col-lg-4 booking-card" data-id="${b.id}" id="booking-card-${b.id}">
      <div class="card d-block">
        <div class="card-body">
          <h4 class="card-title">${b.customer ? b.customer.full_name : ''}</h4>
          <span class="fw-bold">#BK-${b.id}</span><br>
          <span class="badge rounded-pill bg-success">${b.status}</span>
          <div class="mb-3 mt-2">
            <span><i class="ri-car-line"></i> ${b.vehicle ? (b.vehicle.make + ' ' + b.vehicle.model + ' ('+ (b.vehicle.license_plate||'') +')') : ''}</span><br>
            <span><i class="ri-calendar-line"></i> ${startDate.toLocaleDateString()} - ${endDate.toLocaleDateString()}</span>
          </div>
          <hr>
          <div class="mb-3 mt-2">
            <span class="text-black"><b>Total Amount</b></span><br>
            <span>$${parseFloat(b.grand_total).toFixed(2)}</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <a href="javascript:void(0);" class="btn btn-outline-secondary edit-booking flex-grow-1 me-2 d-flex align-items-center justify-content-center" data-id="${b.id}" style="border-radius: 10px;">
              <i class="ri-edit-line"></i> Edit
            </a>
            <a href="javascript:void(0);" class="btn btn-outline-danger delete-booking d-flex align-items-center justify-content-center" data-id="${b.id}" style="border-radius: 10px;">
              <i class="ri-delete-bin-line"></i> Delete
            </a>
          </div>
        </div>
      </div>
    </div>
    `;
  }

  // Clear form helper
  function clearForm(){
    bookingForm.reset();
  }

  

  bookingForm.addEventListener('submit', function(e){
    e.preventDefault();
    const obj = formToObj(bookingForm);
// console.log(obj);
// return false;
    fetch("{{ route('bookings.store') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(obj)
    })
    .then(r => r.json())
    .then(res => {
        if(!res.status){
            if(res.errors){
                const errs = Object.values(res.errors).flat().join('\n');
                return showError(errs);
            }
            return showError('Server error');
        }

        // Success
        showSuccess(res.message || 'Booking created');
        const cardHtml = buildCardHTML(res.booking);
        bookingsContainer.insertAdjacentHTML('afterbegin', cardHtml);
        clearForm();
        createModal.hide();
    })
    .catch(err => {
        console.error(err);
        showError('Request failed');
    });
});


  // MODAL INIT
// const createModal = new bootstrap.Modal(document.getElementById('exampleModal'));
// const bookingForm = document.getElementById('bookingForm');
// const bookingsContainer = document.getElementById('bookingsContainer');

// CLICK EVENT
bookingsContainer.addEventListener('click', function(e){
// createModal.show();
  // -------------------- EDIT BUTTON --------------------

 const editBtn = e.target.closest('.edit-booking');
if(editBtn){
  const id = editBtn.dataset.id;
  fetch(`/bookings/${id}`, {
    headers: { 'Accept': 'application/json' }
  })
  .then(r => r.json())
  .then(json => {

    if(!json.status){
      return showError("Could not load booking");
    }

    const b = json.booking;

    // helper
    const setVal = (selector, val) => {
      
      const el = bookingForm.querySelector(selector);
      if(el) el.value = val ?? '';
    }

    // safe assigns
    setVal('[name="customer_id"]', b.customer_id);
    setVal('[name="vehicle_id"]', b.vehicle_id);

    setVal('[name="pickup_datetime"]',
      b.pickup_datetime ? b.pickup_datetime.replace(' ','T') : ''
    );

    setVal('[name="return_datetime"]',
      b.return_datetime ? b.return_datetime.replace(' ','T') : ''
    );




    

    setVal('[name="pickup_location"]', b.pickup_location);
    setVal('[name="return_location"]', b.return_location);
    setVal('[name="security_deposit"]', b.security_deposit);
    setVal('[name="mileage_package"]', b.mileage_package);
    setVal('[name="rental_type"]', b.rental_type);
    // console.log(b.rental_type)
    // $("#rentalType").val(b.rental_type).change();
    


    // store editing id
    bookingForm.dataset.editingId = b.id;
    // bookingSubmitBtn.innerText = "Update Booking";

    if (typeof recalculateTotal === "function") recalculateTotal();
    if (typeof updatePrice === "function") updatePrice();
    if (typeof calculateTotal === "function") calculateTotal();
    if (typeof updateSummary === "function") updateSummary();
    if (typeof updateRightPanel === "function") updateRightPanel();
    if (typeof updateCharges === "function") updateCharges();

    // ---------------- SHOW MODAL ----------------
    createModal.show();

    setTimeout(() => {
    let checkboxMap = {
        premium_insurance: 'premiumInsurance',
        gps: 'gpsNavigation',
        child_seat: 'childSeat',
        additional_driver: 'additionalDriver',
        airport_pickup: 'airportPickup',
        one_way_rental: 'oneWayRental'
    };

    const modalEl = document.getElementById('exampleModal');

Object.entries(checkboxMap).forEach(([backendKey, htmlName]) => {
    const el = modalEl.querySelector(`[name="${htmlName}"]`);
    console.log(el);
    if(el) el.checked = parseInt(b[backendKey] || 0) === 1;
});

    Object.entries(checkboxMap).forEach(([backendKey, htmlName]) => {
     
        const el = bookingForm.querySelector(`[name="${htmlName}"]`);
        
        if(el) {
            el.checked = parseInt(b[backendKey] || 0) === 1;
            //console.log(htmlName, b[backendKey], el.checked);
        } else {
            //console.warn('Checkbox not found:', htmlName);
        }
    });
}, 50);


// populate checkboxes after modal is rendered



  })
  .catch(err => {
    console.error("ERROR:", err);
    showError("Could not load booking");
  });

  return;
}



  // -------------------- DELETE BUTTON --------------------
  const delBtn = e.target.closest('.delete-booking');
  if(delBtn){
    const id = delBtn.dataset.id;

    Swal.fire({
      title: "Are you sure?",
      text: "This will delete the booking.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it"
    }).then(result => {

      if(result.isConfirmed){
        fetch(`/bookings/${id}`, {
          method: "DELETE",
          headers:{
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
          }
        })
        .then(r => r.json())
        .then(json=>{
          if(json.status){
            showSuccess(json.message);
            const el = document.getElementById("booking-card-"+id);
            if(el) el.remove();
          } else {
            showError("Delete failed");
          }
        })
        .catch(err => showError("Delete failed"));
      }

    });
    return;
  }

});


  
});





$('#bookingSearch').on('keyup', function () {

let query = $(this).val();

$.ajax({
    url: "{{ route('booking.search') }}",
    type: "GET",
    data: { q: query },
    success: function (data) {

        if (data.success && Array.isArray(data.booking)) {

            $("#bookingsContainer").html(""); // clear old cards

            data.booking.forEach(function(b) {

                const startDate = new Date(b.pickup_datetime);
                const endDate = new Date(b.return_datetime);

                let card = `
                <div class="col-md-4 col-lg-4 booking-card" data-id="${b.id}" id="booking-card-${b.id}">
                  <div class="card d-block">
                    <div class="card-body">

                      <h4 class="card-title">${b.customer_name}</h4>

                      <span class="fw-bold">#BK-${b.id}</span><br>
                      <span class="badge rounded-pill bg-success">${b.status}</span>

                      <div class="mb-3 mt-2">
                        <span><i class="ri-car-line"></i> ${
                            b.vehicle 
                            ? (b.vehicle.make + ' ' + b.vehicle.model + ' (' + (b.vehicle.license_plate || '') + ')')
                            : ''
                        }</span><br>
                        <span><i class="ri-calendar-line"></i> 
                            ${startDate.toLocaleDateString()} - ${endDate.toLocaleDateString()}
                        </span>
                      </div>

                      <hr>

                      <div class="mb-3 mt-2">
                        <span class="text-black"><b>Total Amount</b></span><br>
                        <span>$${parseFloat(b.grand_total).toFixed(2)}</span>
                      </div>

                      <div class="d-flex justify-content-between align-items-center">
                        <a href="javascript:void(0);" 
                           class="btn btn-outline-secondary edit-booking flex-grow-1 me-2 d-flex align-items-center justify-content-center" 
                           data-id="${b.id}" style="border-radius: 10px;">
                          <i class="ri-edit-line"></i> Edit
                        </a>

                        <a href="javascript:void(0);" 
                           class="btn btn-outline-danger delete-booking d-flex align-items-center justify-content-center" 
                           data-id="${b.id}" style="border-radius: 10px;">
                          <i class="ri-delete-bin-line"></i> Delete
                        </a>
                      </div>

                    </div>
                  </div>
                </div>
                `;

                $("#bookingsContainer").prepend(card);

            }); // end loop

        } // end success
    }
});

});





$('#statusFilter').on('change', function () {

let query = $(this).val();

$.ajax({
    url: "{{ route('booking_status.search') }}",
    type: "GET",
    data: { q: query },
    success: function (data) {

        if (data.success && Array.isArray(data.booking)) {

            $("#bookingsContainer").html(""); // clear old cards

            data.booking.forEach(function(b) {

                const startDate = new Date(b.pickup_datetime);
                const endDate = new Date(b.return_datetime);

                let card = `
                <div class="col-md-4 col-lg-4 booking-card" data-id="${b.id}" id="booking-card-${b.id}">
                  <div class="card d-block">
                    <div class="card-body">

                      <h4 class="card-title">${b.customer_name}</h4>

                      <span class="fw-bold">#BK-${b.id}</span><br>
                      <span class="badge rounded-pill bg-success">${b.status}</span>

                      <div class="mb-3 mt-2">
                        <span><i class="ri-car-line"></i> ${
                            b.vehicle 
                            ? (b.vehicle.make + ' ' + b.vehicle.model + ' (' + (b.vehicle.license_plate || '') + ')')
                            : ''
                        }</span><br>
                        <span><i class="ri-calendar-line"></i> 
                            ${startDate.toLocaleDateString()} - ${endDate.toLocaleDateString()}
                        </span>
                      </div>

                      <hr>

                      <div class="mb-3 mt-2">
                        <span class="text-black"><b>Total Amount</b></span><br>
                        <span>$${parseFloat(b.grand_total).toFixed(2)}</span>
                      </div>

                      <div class="d-flex justify-content-between align-items-center">
                        <a href="javascript:void(0);" 
                           class="btn btn-outline-secondary edit-booking flex-grow-1 me-2 d-flex align-items-center justify-content-center" 
                           data-id="${b.id}" style="border-radius: 10px;">
                          <i class="ri-edit-line"></i> Edit
                        </a>

                        <a href="javascript:void(0);" 
                           class="btn btn-outline-danger delete-booking d-flex align-items-center justify-content-center" 
                           data-id="${b.id}" style="border-radius: 10px;">
                          <i class="ri-delete-bin-line"></i> Delete
                        </a>
                      </div>

                    </div>
                  </div>
                </div>
                `;

                $("#bookingsContainer").prepend(card);

            }); // end loop

        } // end success
    }
});

});



  // -------------------- UPDATE FORM SUBMIT --------------------
  
</script>

