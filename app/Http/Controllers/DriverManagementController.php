<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Booking;
use App\Models\DriverIncident;

class DriverManagementController extends Controller
{
    public function index(){
        $data['page'] = 'Driver Management';
        $data['pagenav'] = 'Add Driver';
        $data['customers'] = Customers::all(); 
        $data['incidents'] = DriverIncident::with(['customer','booking'])->latest()->get();
//dd($data['incidents']);
        return view('driver.index')->with($data);
    }

    public function getBookings($customer_id){
        $bookings = Booking::where('customer_id', $customer_id)->get();
        return response()->json($bookings);
    }

    public function storeIncident(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'incident_date' => 'required',
            'incident_type' => 'required',
            'severity' => 'required',
            'description' => 'required',
        ]);
   //dd($request->all());
        $incident = DriverIncident::create([
            'customer_id'       => $request->customer_id,
            'booking_id'        => $request->booking_id,
            'incident_date'     => $request->incident_date,
            'incident_type'     => $request->incident_type,
            'severity'          => $request->severity,
            'financial_impact'  => $request->financial_impact,
            'reported_by'       => $request->reported_by,
            'description'       => $request->description,
            'action_taken'      => $request->action_taken,
        ]);
    
        return response()->json(['status'=>true,'message'=>'Incident Saved Successfully!']);
    }


}
