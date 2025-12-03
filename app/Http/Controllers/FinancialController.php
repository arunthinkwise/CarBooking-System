<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customers;
use App\Models\FleetModel;
use App\Models\FinancialModel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class FinancialController extends Controller
{
    public function index(){
        $data['page'] = 'Financial Management';
        $data['pagenav'] = 'Add Finance';
         
    $data['bookings'] = Booking::with(['customer', 'vehicle'])
    ->where('status', 'active') 
    ->get();


    $data['payments'] = Booking::with(['customer','vehicle'])
    ->whereIn('id', function($q){
        $q->select('booking_id')->from('payments');
    })
    ->get()
    ->map(function($b){
        $b->invoice = \App\Models\FinancialModel::where('booking_id',$b->id)->latest()->first();
        return $b;
    });




// 1. Total Revenue (All Payments Sum)
$data['total_revenue'] = FinancialModel::sum('amount');

// 2. This Month Revenue
$data['this_month'] = FinancialModel::whereMonth('payment_date', Carbon::now()->month)
                                    ->whereYear('payment_date', Carbon::now()->year)
                                    ->sum('amount');

// 3. Pending Payments (Grand Total - Paid)
$paid = FinancialModel::sum('amount');
$grand = Booking::sum('grand_total');
$data['pending_payments'] = $grand - $paid;

// 4. Total Transactions (count of all payments)
$data['total_transactions'] = FinancialModel::count();

return view('finance.index')->with($data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required',
            'transaction_id' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
        //dd($this->generateInvoiceNumber());
        $payment = FinancialModel::create([
            'booking_id' => $request->booking_id,
            'payment_date' => $request->payment_date,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
            'invoice_number'=>$this->generateInvoiceNumber(),
            'notes' => $request->notes,
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Payment recorded successfully!'
        ]);
    }
    
    private function generateInvoiceNumber()
    {
        // Prefix: INV-20251203-
        $prefix = "INV-" . now()->format('Ymd') . "-";
    
        // Last invoice of today
        $last = \DB::table('payments')
            ->where('invoice_number', 'like', $prefix . '%')
            ->orderBy('invoice_number', 'desc')
            ->value('invoice_number');
    
        if ($last) {
            // Get last 5 digits and +1
            $num = (int) substr($last, -5) + 1;
        } else {
            $num = 1;
        }
    
        return $prefix . str_pad($num, 5, '0', STR_PAD_LEFT);
    }




    
    public function getInvoiceData($id)
{
    $booking = Booking::with(['customer','vehicle'])->findOrFail($id);

    $payment = FinancialModel::where('booking_id', $id)->latest()->first();

    // Duration
    $days = \Carbon\Carbon::parse($booking->pickup_datetime)
                ->diffInDays(\Carbon\Carbon::parse($booking->return_datetime));

    $rate = $booking->base_rate;

    $amount = $days * $rate;

    return response()->json([
        'booking' => $booking,
        'payment' => $payment,
        'days'    => $days,
        'rate'    => $rate,
        'amount'  => $amount,
        'invoice_number' => $payment->invoice_number
    ]);
}

public function downloadPDF($id)
{
    $booking = Booking::with(['customer','vehicle'])->findOrFail($id);
    $payment = FinancialModel::where('booking_id', $id)->latest()->first();

    $days = \Carbon\Carbon::parse($booking->pickup_datetime)
            ->diffInDays(\Carbon\Carbon::parse($booking->return_datetime));

    $rate = $booking->base_rate;
    $amount = $days * $rate;

    $pdf = Pdf::loadView('finance.invoice_pdf', [
        'booking'=>$booking,
        'payment'=>$payment,
        'days'=>$days,
        'rate'=>$rate,
        'amount'=>$amount
    ]);

    return $pdf->download('Invoice-'.$payment->invoice_number.'.pdf');
}


}
