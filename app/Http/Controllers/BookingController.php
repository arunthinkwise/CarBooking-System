<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\FleetModel;
use App\Models\Customers;
use App\Models\Booking;


class BookingController extends Controller
{
    public function index(){
        $data['page'] = 'Booking Management';
        $data['pagenav'] = 'Add Booking';
        $data['vehicles'] = FleetModel::all();
        $data['bookings'] = Booking::with(['customer', 'vehicle'])
        ->orderBy('id','desc')
        ->get();
        $data['customers'] = Customers::all();
       

        return view('booking.index')->with($data);
    }


    public function store(Request $request){
        //dd($request->premiumInsurance);
        $v = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'vehicle_id'  => 'required|exists:vehicles,id',
            'pickup_datetime' => 'required|date',
            'return_datetime' => 'required|date|after_or_equal:pickup_datetime',
            'rental_type' => 'required|in:daily,weekly,monthly',
        ]);

        if($v->fails()){
            return response()->json(['status'=>false,'errors'=>$v->errors()], 422);
        }



      
        //  Check if same vehicle already booked in selected date range
        $exists = Booking::where('vehicle_id', $request->vehicle_id)
            ->where(function ($q) use ($request) {
                $q->where('pickup_datetime', '<', $request->return_datetime)
                  ->where('return_datetime', '>', $request->pickup_datetime);
            })
            ->exists();
        
        if ($exists) {
            return response()->json(['status' => false,'errors' => 'This vehicle is already booked for the selected dates.']);
        }
        


        // Create booking
        $booking = Booking::create([
            'customer_id' => $request->customer_id,
            'vehicle_id'  => $request->vehicle_id,
            'pickup_datetime' => $request->pickup_datetime,
            'return_datetime' => $request->return_datetime,
            'pickup_location' => $request->pickup_location,
            'return_location' => $request->return_location,
            'rental_type' => $request->rental_type,
            'mileage_package' => $request->mileage_package ?? 'limited',
            'security_deposit' => $request->security_deposit ?? 0,
            'premium_insurance' => $request->premiumInsurance ? 1 : 0,
            'gps' => $request->gpsNavigation ? 1 : 0,
            'child_seat' => $request->childSeat ? 1 : 0,
            'additional_driver' => $request->additionalDriver ? 1 : 0,
            'airport_pickup' => $request->airportPickup ? 1 : 0,
            'one_way_rental' => $request->oneWayRental ? 1 : 0,
            'base_rate' => $request->base_rate ?? 0,
            'addons_total' => $request->addons_total ?? 0,
            'grand_total' => $request->grand_total ?? 0,
            'status' => $request->status ?? 'active',
            'notes' => $request->notes ?? null,
        ]);

        $booking->load('vehicle','customer');

        return response()->json(['status'=>true,'message'=>'Booking created','booking'=>$booking]);
    }

    // app/Http/Controllers/BookingController.php
    public function show($id)
    {
        $booking = Booking::with(['customer', 'vehicle'])->find($id);
        if(!$booking){
            return response()->json(['status'=>false,'message'=>'Booking not found']);
        }
        return response()->json(['status'=>true,'booking'=>$booking]);
    }




    public function destroy($id)
{
    $booking = Booking::find($id);

    if (!$booking) {
        return response()->json([
            'status' => false,
            'message' => 'Booking not found'
        ]);
    }

    $booking->delete();

    return response()->json([
        'status' => true,
        'message' => 'Booking deleted successfully'
    ]);
}


public function update(Request $request, $id)
{
   // dd($request->all());
    $booking = Booking::find($id);
    if (!$booking) {
        return response()->json(['status' => false, 'message' => 'Booking not found'], 404);
    }
    $v = Validator::make($request->all(), [
        'customer_id' => 'required|exists:customers,id',
        'vehicle_id'  => 'required|exists:vehicles,id',
        'pickup_datetime' => 'required|date',
        'return_datetime' => 'required|date|after_or_equal:pickup_datetime',
        'rental_type' => 'required|in:daily,weekly,monthly',
    ]);

    if ($v->fails()) {
        return response()->json(['status' => false, 'errors' => $v->errors()], 422);
    }
    $booking->update([
        'customer_id' => $request->customer_id,
        'vehicle_id'  => $request->vehicle_id,
        'pickup_datetime' => $request->pickup_datetime,
        'return_datetime' => $request->return_datetime,
        'pickup_location' => $request->pickup_location,
        'return_location' => $request->return_location,
        'rental_type' => $request->rental_type,
        'mileage_package' => $request->mileage_package ?? 'limited',
        'security_deposit' => $request->security_deposit ?? 0,
        'premium_insurance' => $request->premium_insurance ? 1 : 0,
        'gps' => $request->gps ? 1 : 0,
        'child_seat' => $request->child_seat ? 1 : 0,
        'additional_driver' => $request->additional_driver ? 1 : 0,
        'airport_pickup' => $request->airport_pickup ? 1 : 0,
        'one_way_rental' => $request->one_way_rental ? 1 : 0,
        'base_rate' => $request->base_rate ?? 0,
        'addons_total' => $request->addons_total ?? 0,
        'grand_total' => $request->grand_total ?? 0,
        'status' => $request->status ?? 'active',
        'notes' => $request->notes ?? null,
    ]);
    $booking->load('vehicle', 'customer');
    return response()->json([
        'status' => true,
        'message' => 'Booking updated successfully',
        'booking' => $booking
    ]);
}
    

public function search(Request $request)
{
    $q = trim($request->q);

$bookings = \DB::table('bookings')
    ->leftJoin('vehicles', 'bookings.vehicle_id', '=', 'vehicles.id')
    ->leftJoin('customers', 'bookings.customer_id', '=', 'customers.id')
    ->where(function($query) use ($q) {

        $query->where('vehicles.make', 'LIKE', "%$q%")
              ->orWhere('vehicles.model', 'LIKE', "%$q%")
              ->orWhere('vehicles.license_plate', 'LIKE', "%$q%")
              ->orWhere('customers.full_name', 'LIKE', "%$q%");
    })
    ->select(
        'bookings.*',
        'vehicles.make',
        'vehicles.model',
        'vehicles.license_plate',
        'customers.full_name as customer_name'
    )
    ->get();

return response()->json([
    'success' => true,
    'booking' => $bookings
]);

}

public function status_search(Request $request){


    $q = trim($request->q);

    $bookings = \DB::table('bookings')
        ->leftJoin('vehicles', 'bookings.vehicle_id', '=', 'vehicles.id')
        ->leftJoin('customers', 'bookings.customer_id', '=', 'customers.id')
        ->where(function($query) use ($q) {
    
            $query->where('bookings.status', 'LIKE', "%$q%");
        })
        ->select(
            'bookings.*',
            'vehicles.make',
            'vehicles.model',
            'vehicles.license_plate',
            'customers.full_name as customer_name'
        )
        ->get();
    
    return response()->json([
        'success' => true,
        'booking' => $bookings
    ]);
    


}


}
