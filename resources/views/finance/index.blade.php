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
                        <a class="btn text-white mb-2 bg-secondary bg-gradient" data-bs-toggle="modal" data-bs-target="#exampleModalGenerate">
                                    <i class="ri-file-upload-fill"></i>Generate Invoice
</a>     

<a class="btn text-white mb-2 bg-success bg-gradient" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="ri-add-circle-fill"></i> Record Payment
</a>     
                        <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Revenue</h5>
                                                <h3 class="my-3">${{ $total_revenue }}</h3>
                                                
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
                                                <h3 class="my-3">${{ $this_month }}</h3>
                                               
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
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Pending Payments</h5>
                                                <h3 class="my-3">${{ $pending_payments }}</h3>
                                               
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
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Total Transactions</h5>
                                                <h3 class="my-3">{{ $total_transactions }}</h3>
                                               
                                            </div>
                                            <div id="widget-growth" class="apex-charts" data-colors="#ffc35a,#e3e9ee"></div>
                                        </div>
                                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Record Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form>

                    <!-- Booking -->
                    <div class="mb-3">
                        <label class="form-label">Booking</label>
                        <select class="form-control" id="bookingDropdown">
    <option selected disabled>Select booking</option>

    @foreach($bookings as $b)
        <option value="{{ $b->id }}" 
                data-amount="{{ $b->grand_total }}">
            {{ $b->customer->full_name }} - 
            {{ $b->vehicle->make }} {{ $b->vehicle->model }} 
            ({{ $b->vehicle->license_plate }})
        </option>
    @endforeach
</select>

                    </div>

                    <!-- Payment Date -->
                    <div class="mb-3">
                        <label class="form-label">Payment Date *</label>
                        <input type="date" class="form-control" id="paymentDate">
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label class="form-label">Amount ($) *</label>
                        <input type="number" class="form-control" id="amountInput" value="0">
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label class="form-label">Payment Method *</label>
                        <select class="form-select" id="paymentMethod">
                            <option selected>Cash</option>
                            <option value="Card">Card</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="UPI">UPI</option>
                        </select>
                    </div>

                    <!-- Transaction ID -->
                    <div class="mb-3">
                        <label class="form-label">Transaction ID</label>
                        <input type="text" class="form-control" id="transactionId" placeholder="Optional reference number">
                    </div>

                    <!-- Notes -->
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" rows="2" placeholder="Additional payment notes"></textarea>
                    </div>

                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="savePaymentBtn">Record Payment</button>
            </div>

        </div>
    </div>
</div>






<div class="modal fade" id="exampleModalGenerate" tabindex="-1" aria-labelledby="exampleModalGenerate" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form>

                    <!-- Booking -->
                    <div class="mb-3">
                        <label class="form-label">Invoice</label>
                        <select class="form-control" id="InvoiceGenrate">
    <option selected disabled>Select Booking Invoice</option>

    @foreach($payments as $b)
        @if($b->invoice && $b->invoice->invoice_number)
        <option value="{{ $b->id }}"
                data-invoice="{{ $b->invoice->invoice_number }}"
                data-amount="{{ $b->grand_total }}">

            {{ $b->invoice->invoice_number }} -
            {{ $b->customer->full_name }}
            <!-- {{ $b->vehicle->make }} {{ $b->vehicle->model }}
            ({{ $b->vehicle->license_plate }}) -
            ${{ $b->grand_total }} -->

        </option>
        @endif
    @endforeach
</select>

                    </div>

                    <div id="invoicePreview" class="card p-4" style="display:none;">

    <h2 class="text-center mb-0">INVOICE</h2>
    <p class="text-center text-muted">RentalPro Car Rentals</p>

    <div class="d-flex justify-content-between mt-3">
        <div>
            <strong>Bill To:</strong>
            <p id="invCustomer"></p>
        </div>

        <div>
            <strong>Invoice #:</strong>
            <p id="invNumber"></p>

            <strong>Date:</strong>
            <p id="invDate"></p>
        </div>
    </div>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Duration</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="invVehicle"></td>
                <td id="invDuration"></td>
                <td id="invAmount"></td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        <div class="text-end">
            <p><strong>Subtotal:</strong> <span id="invSubtotal"></span></p>
            <h4><strong>Total:</strong> <span id="invTotal"></span></h4>
        </div>
    </div>

    <div class="text-center mt-4 text-muted">
        Thank you for your business!<br>
        Questions? Contact us at support@rentalpro.com
    </div>

</div>


                    

                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-success" id="downloadPDF">Download Invoice</a>
            </div>

        </div>
    </div>
</div>

                        </div> <!-- end row -->

                        <div class="container-fluid py-4">
  <div class="row">
    <!-- Left Column: Revenue Breakdown -->
    <div class="col-xl-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <!-- Tabs -->
          <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">Overview</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="recent-tab" data-bs-toggle="tab" data-bs-target="#recent" type="button" role="tab" aria-controls="recent" aria-selected="false">Recent Payments</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</button>
            </li>
          </ul>

          <!-- Tab Content -->
          <div class="tab-content" id="myTabContent">
            <!-- Overview -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <h5 class="fw-bold mb-3">Revenue Breakdown</h5>

              <div class="p-3 mb-3 bg-success bg-opacity-10 rounded d-flex justify-content-between align-items-center">
                <span class="fw-semibold text-dark">Completed Bookings</span>
                <span class="fw-bold text-success">$0</span>
              </div>

              <div class="p-3 mb-3 bg-primary bg-opacity-10 rounded d-flex justify-content-between align-items-center">
                <span class="fw-semibold text-dark">Active Rentals</span>
                <span class="fw-bold text-primary">$1,165.8</span>
              </div>

              <div class="p-3 mb-3 bg-warning bg-opacity-10 rounded d-flex justify-content-between align-items-center">
                <span class="fw-semibold text-dark">Confirmed Bookings</span>
                <span class="fw-bold text-warning">$360</span>
              </div>
            </div>

            <!-- Recent Payments -->
            <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab">
              <p class="text-muted">No recent payments available.</p>
            </div>

            <!-- Pending -->
            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
              <p class="text-muted">No pending transactions.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Payment Methods -->
    <div class="col-xl-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Payment Methods</h5>

          <div class="p-3 mb-3 bg-light rounded d-flex justify-content-between align-items-center">
            <div>
              <span class="fw-semibold">Credit Card</span><br>
              <small class="text-muted">1 transaction</small>
            </div>
            <span class="fw-bold text-dark">$225</span>
          </div>

          <div class="p-3 mb-3 bg-light rounded d-flex justify-content-between align-items-center">
            <div>
              <span class="fw-semibold">Cash</span><br>
              <small class="text-muted">1 transaction</small>
            </div>
            <span class="fw-bold text-dark">$180</span>
          </div>

          <div class="p-3 mb-3 bg-light rounded d-flex justify-content-between align-items-center">
            <div>
              <span class="fw-semibold">Debit Card</span><br>
              <small class="text-muted">1 transaction</small>
            </div>
            <span class="fw-bold text-dark">$456</span>
          </div>

          <div class="p-3 bg-light rounded d-flex justify-content-between align-items-center">
            <div>
              <span class="fw-semibold">Bank Transfer</span><br>
              <small class="text-muted">0 transactions</small>
            </div>
            <span class="fw-bold text-dark">$0</span>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('bookingDropdown').addEventListener('change', function() {
    let amount = this.options[this.selectedIndex].getAttribute('data-amount');
    document.getElementById('amountInput').value = amount;
});


</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let today = new Date().toISOString().split('T')[0];
    document.getElementById("paymentDate").value = today;
});
</script>


<script>
$('#savePaymentBtn').click(function () {


 // --- Required Field Validation ---
 if ($('#bookingDropdown').val() === "" || $('#bookingDropdown').val() === null) {
        Swal.fire({
            icon: "error",
            title: "Required",
            text: "Please select a booking!"
        });
        return;
    }

    if ($('#amountInput').val() === "" || $('#amountInput').val() <= 0) {
        Swal.fire({
            icon: "error",
            title: "Required",
            text: "Amount must be greater than 0!"
        });
        return;
    }

    if ($('#transactionId').val() === "") {
        Swal.fire({
            icon: "error",
            title: "Required",
            text: "Transaction ID is required!"
        });
        return;
    }
  
    let data = {
        booking_id: $('#bookingDropdown').val(),
        payment_date: $('#paymentDate').val(),
        amount: $('#amountInput').val(),
        payment_method: $('#paymentMethod').val(),
        transaction_id: $('#transactionId').val(),
        notes: $('#notes').val(),
        _token: "{{ csrf_token() }}"
    };

    $.ajax({
        url: "{{ route('payment.store') }}",
        type: "POST",
        data: data,
        success: function (response) {
            if (response.status === 'success') {

                // Success message
                Swal.fire({
                        icon: "success",
                        title: "Submmited",
                        text: "Payment created successfully.",
                        timer: 1500,
                        showConfirmButton: false
                    });

                // Modal close
                $('#exampleModal').modal('hide');

                // Reset form
                $('#bookingDropdown').val('');
                $('#amountInput').val('');
                $('#transactionId').val('');
                $('#notes').val('');

                // Optional: Page refresh
                
            }
        },
        error: function (xhr) {
          Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Failed to delete vehicle!"
                    });
        }
    });

});



$('#InvoiceGenrate').change(function() {
    let bookingId = $(this).val();

    $.ajax({
        url: "/finance/get-invoice/" + bookingId,
        type: "GET",
        success: function(res) {

            // Show preview box
            $("#invoicePreview").show();

            // Fill Data
            $("#invCustomer").text(res.booking.customer.full_name);
            $("#invNumber").text(res.invoice_number);
            $("#invDate").text(new Date().toDateString());

            $("#invVehicle").text(
                res.booking.vehicle.make + " " + 
                res.booking.vehicle.model + 
                " (" + res.booking.vehicle.license_plate + ")"
            );

            $("#invDuration").text(res.days + " days @ $" + res.rate + "/day");
            $("#invAmount").text("$" + res.amount.toFixed(2));
            $("#invSubtotal").text("$" + res.amount.toFixed(2));
            $("#invTotal").text("$" + res.amount.toFixed(2));
            $('#downloadPDF').attr('href', '/invoice/pdf/' + bookingId);
        }
    });
});

</script>
