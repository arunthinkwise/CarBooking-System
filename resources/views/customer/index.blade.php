
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

<div class="col-md-12">
    <input type="text" id="customerSearch" class="form-control" placeholder="Search by Name, Email,Phone, License Plate...">
</div>



</div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" id="customerList">
                        
                        @if(isset($customers))
@foreach($customers as $cust)

@php
    $initials = strtoupper(substr($cust->full_name, 0, 2));
@endphp

<div class="col-md-4 col-lg-4">
    <div class="card shadow-sm border-0" style="max-width: 360px;">
        <div class="card-body">

            <div class="d-flex align-items-center mb-3">

                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3"
                     style="width:60px; height:60px;">
                    <span class="fw-bold text-muted fs-5">{{ $initials }}</span>
                </div>

                <div>
                    <h5 class="card-title mb-0 fw-bold">{{ $cust->full_name }}</h5>
                    <small class="text-muted">{{ $cust->city ?? '' }}</small>
                </div>

                <a href="javascript:void(0)" onclick="editCustomer({{ $cust->id }})" class="ms-auto text-muted">
                    <i class="bi bi-pencil"></i>
                </a>

            </div>

            <div class="mb-2">
                <i class="bi bi-envelope me-2 text-muted"></i>
                <span>{{ $cust->email }}</span>
            </div>

            <div class="mb-2">
                <i class="bi bi-telephone me-2 text-muted"></i>
                <span>{{ $cust->phone }}</span>
            </div>

            <div class="mb-3">
                <i class="bi bi-card-text me-2 text-muted"></i>
                <span>{{ $cust->drivers_license }}</span>
            </div>

            <hr>

            <div class="d-flex justify-content-between">
                <div>
                    <small class="text-muted d-block">Total Rentals</small>
                    <span class="fw-bold fs-5">{{ $cust->total_rentals ?? 0 }}</span>
                </div>

                <div class="text-end">
                    <small class="text-muted d-block">Total Spent</small>
                    <span class="fw-bold fs-5 text-success">${{ $cust->total_spent ?? 0 }}</span>
                </div>
            </div>

        </div>
    </div>
</div>

@endforeach
@endif


</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form id="customerForm">
  <input type="hidden" id="customer_id">

  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Full Name *</label>
      <input type="text" id="full_name" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Email *</label>
      <input type="email" id="email" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Phone *</label>
      <input type="text" id="phone" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Driver's License *</label>
      <input type="text" id="drivers_license" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">License Expiry *</label>
      <input type="date" id="license_expiry" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Date of Birth *</label>
      <input type="date" id="dob" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">City *</label>
      <input type="text" id="city" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Country *</label>
      <input type="text" id="country" class="form-control" required>
    </div>

    <div class="col-12">
      <label class="form-label">Address *</label>
      <input type="text" id="address" class="form-control" required>
    </div>

    <div class="col-12">
      <label class="form-label">Notes</label>
      <textarea id="notes" class="form-control" rows="2"></textarea>
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

                        
                    </div> <!-- container -->

                </div> <!-- content -->

                @include('layouts.footer')
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                  // RESET FORM ON OPEN
// $('#exampleModal').on('show.bs.modal', function () {
//     $("#customerForm")[0].reset();
//     $("#customer_id").val('');
//     $("#exampleModalLabel").text("Add New Customer");
// });

// SAVE BUTTON CLICK
$(".btn-primary").click(function () {

    let id = $("#customer_id").val();
    let url = id ? `/customer/update/${id}` : "/customer/store";

    $.ajax({
        url: url,
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            full_name: $("#full_name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            drivers_license: $("#drivers_license").val(),
            license_expiry: $("#license_expiry").val(),
            dob: $("#dob").val(),
            city: $("#city").val(),
            country: $("#country").val(),
            address: $("#address").val(),
            notes: $("#notes").val(),
        },
        success: function (res) {

            $("#customerForm")[0].reset();
            $("#exampleModal").modal('hide');
            loadCustomers();

            Swal.fire({
                icon: "success",
                title: id ? "Customer Updated!" : "Customer Added!",
                showConfirmButton: false,
                timer: 1500
            });
        },
        error: function (err) {
            let errors = err.responseJSON.errors;
            let html = "";

            $.each(errors, function (key, val) {
                html += `${val[0]}<br>`;
            });

            Swal.fire({
                icon: "error",
                title: "Validation Error",
                html: html
            });
        }
    });
});

function editCustomer(id) {

$.get(`/customer/show/${id}`, function (customer) {

    $("#customer_id").val(customer.id);
    $("#full_name").val(customer.full_name);
    $("#email").val(customer.email);
    $("#phone").val(customer.phone);
    $("#drivers_license").val(customer.drivers_license);
    $("#license_expiry").val(customer.license_expiry);
    $("#dob").val(customer.dob);
    $("#city").val(customer.city);
    $("#country").val(customer.country);
    $("#address").val(customer.address);
    $("#notes").val(customer.notes);

    $("#exampleModalLabel").text("Edit Customer");
    $("#exampleModal").modal("show");
});
}


function deleteCustomer(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This customer will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Delete"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: `/customer/delete/${id}`,
                method: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function () {

                    loadCustomers();

                    Swal.fire({
                        icon: "success",
                        title: "Deleted Successfully",
                        timer: 1500
                    });
                }
            });
        }
    });
    
}

function loadCustomers() {
    $.get('/customer/fetch', function (res) {

        let html = "";

        res.forEach(c => {

            let initials = (c.full_name)
                .split(" ")
                .map(n => n.charAt(0).toUpperCase())
                .join("");

            html += `
            <div class="col-md-4 col-lg-4">
              <div class="card shadow-sm border-0" style="max-width: 360px;">
                <div class="card-body">

                  <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width:60px; height:60px;">
                      <span class="fw-bold text-muted fs-5">${initials}</span>
                    </div>

                    <div>
                      <h5 class="card-title mb-0 fw-bold">${c.full_name}</h5>
                      <small class="text-muted">${c.city ?? ''}</small>
                    </div>

                    <a href="javascript:void(0)" onclick="editCustomer(${c.id})" class="ms-auto text-muted">
                      <i class="bi bi-pencil"></i>
                    </a>
                  </div>

                  <div class="mb-2">
                    <i class="bi bi-envelope me-2 text-muted"></i>
                    <span>${c.email}</span>
                  </div>

                  <div class="mb-2">
                    <i class="bi bi-telephone me-2 text-muted"></i>
                    <span>${c.phone}</span>
                  </div>

                  <div class="mb-3">
                    <i class="bi bi-card-text me-2 text-muted"></i>
                    <span>${c.drivers_license}</span>
                  </div>

                  <hr>

                  <div class="d-flex justify-content-between">
                    <div>
                      <small class="text-muted d-block">Total Rentals</small>
                      <span class="fw-bold fs-5">${c.total_rentals ?? 0}</span>
                    </div>

                    <div class="text-end">
                      <small class="text-muted d-block">Total Spent</small>
                      <span class="fw-bold fs-5 text-success">$${c.total_spent ?? 0}</span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            `;
        });

        $("#customerList").html(html);
    });
}




$('#customerSearch').on('keyup', function () {

let query = $(this).val();

$.ajax({
    url: "{{ route('customer.search') }}",
    type: "GET",
    data: { q: query },
    success: function (data) {
        console.log(data);

        if (data.success) {

            let html = "";

            data.customers.forEach(function(c) {

                let initials = (c.full_name)
                    .split(" ")
                    .map(n => n.charAt(0).toUpperCase())
                    .join("");

                html += `
                <div class="col-md-4 col-lg-4">
                    <div class="card shadow-sm border-0" style="max-width: 360px;">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3"
                                     style="width:60px; height:60px;">
                                    <span class="fw-bold text-muted fs-5">${initials}</span>
                                </div>

                                <div>
                                    <h5 class="card-title mb-0 fw-bold">${c.full_name}</h5>
                                    <small class="text-muted">${c.city ?? ''}</small>
                                </div>

                                <a href="javascript:void(0)" onclick="editCustomer(${c.id})" class="ms-auto text-muted">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>

                            <div class="mb-2">
                                <i class="bi bi-envelope me-2 text-muted"></i>
                                <span>${c.email}</span>
                            </div>

                            <div class="mb-2">
                                <i class="bi bi-telephone me-2 text-muted"></i>
                                <span>${c.phone}</span>
                            </div>

                            <div class="mb-3">
                                <i class="bi bi-card-text me-2 text-muted"></i>
                                <span>${c.drivers_license}</span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <small class="text-muted d-block">Total Rentals</small>
                                    <span class="fw-bold fs-5">${c.total_rentals ?? 0}</span>
                                </div>

                                <div class="text-end">
                                    <small class="text-muted d-block">Total Spent</small>
                                    <span class="fw-bold fs-5 text-success">$${c.total_spent ?? 0}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>`;
            });

            $("#customerList").html(html); // ⭐ Correct place to show results
        }
    }
});

});

                </script>