<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; padding:30px; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        th,td { border-bottom:1px solid #ddd; padding:10px; text-align:left; }
        h2 { text-align:center; margin-bottom:0 }
        .text-right { text-align:right; }
    </style>
</head>
<body>

    <h2>INVOICE</h2>
    <p style="text-align:center">RentalPro Car Rentals</p>

    <div style="display:flex; justify-content:space-between; margin-top:20px;">
        <div>
            <b>Bill To:</b><br>
            {{ $booking->customer->full_name }}
        </div>
        <div>
            <b>Invoice #:</b> {{ $payment->invoice_number }} <br>
            <b>Date:</b> {{ now()->format('M d, Y') }}
        </div>
    </div>

    <table>
        <tr>
            <th>Description</th>
            <th>Duration</th>
            <th class="text-right">Amount</th>
        </tr>
        <tr>
            <td>{{ $booking->vehicle->make }} {{ $booking->vehicle->model }} ({{ $booking->vehicle->license_plate }})</td>
            <td>{{ $days }} days @ ${{ $rate }}/day</td>
            <td class="text-right">${{ number_format($amount,2) }}</td>
        </tr>
    </table>

    <p class="text-right" style="margin-top:15px;">
        <b>Subtotal:</b> ${{ number_format($amount,2) }} <br>
        <b>Total:</b> ${{ number_format($amount,2) }}
    </p>

    <p style="text-align:center;margin-top:50px;font-size:12px;">
        Thank you for your business! <br>
        Questions? support@rentalpro.com
    </p>
</body>
</html>
