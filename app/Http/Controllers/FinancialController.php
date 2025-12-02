<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customers;
use App\Models\FleetModel;
use App\Models\FinancialModel;
use Carbon\Carbon;

class FinancialController extends Controller
{
    public function index(){
        $data['page'] = 'Financial Management';
        $data['pagenav'] = 'Add Finance';
         
    $data['bookings'] = Booking::with(['customer', 'vehicle'])
    ->where('status', 'active') 
    ->get();



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
    
        $payment = FinancialModel::create([
            'booking_id' => $request->booking_id,
            'payment_date' => $request->payment_date,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
            'notes' => $request->notes,
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Payment recorded successfully!'
        ]);
    }
    


}
