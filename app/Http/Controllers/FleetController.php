<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FleetModel;
use Illuminate\Support\Facades\Validator;

class FleetController extends Controller
{
    public function index(){
        $data['page'] = 'Fleet Management';
        $data['pagenav'] = 'Add Fleet';
        $vehicles = FleetModel::latest()->get();
        return view('fleet.index',compact('vehicles'))->with($data);
    }

    public function calander(){
        $data['page'] = 'Calendar';
        $data['pagenav'] = 'Add Calendar';
        return view('fleet.calendar')->with($data);
    }

    public function list()
{
    return response()->json([
        'vehicles' => FleetModel::orderBy('id', 'desc')->get()
    ]);
}



public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'make' => 'required',
        'model' => 'required',
        'year' => 'required|integer',
        'license_plate' => 'required|unique:vehicles,license_plate',
        'category' => 'required',
        'fuel_type' => 'required',
        'transmission' => 'required',
        'seats' => 'required|integer',
        'miles_per_day' => 'required|integer',
        'daily_rate' => 'required|numeric',
        'hourly_rate' => 'required|numeric',
        'weekly_rate' => 'required|numeric',
        'monthly_rate' => 'required|numeric',
        'weekend_rate' => 'required|numeric',
        'status' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $vehicle = \App\Models\FleetModel::create($validator->validated());

    return response()->json([
        'success' => true,
        'vehicle' => $vehicle
    ]);
}

// Show vehicle data for edit
public function show($id)
{
    $vehicle = FleetModel::find($id);
    if(!$vehicle){
        return response()->json(['success' => false, 'message' => 'Vehicle not found'], 404);
    }

    return response()->json([
        'success' => true,
        'vehicle' => $vehicle
    ]);
}

// Update existing vehicle
public function update(Request $request, $id)
{

     //dd($request->all());
    $vehicle = FleetModel::find($id);
    if(!$vehicle){
        return response()->json(['success' => false, 'message' => 'Vehicle not found'], 404);
    }

    $validator = Validator::make($request->all(), [
        'make' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|integer',
        'license_plate' => 'required|string|max:50|unique:vehicles,license_plate,'.$vehicle->id,
        'category' => 'required|string',
        'fuel_type' => 'required|string',
        'transmission' => 'required|string',
        'seats' => 'required|integer',
        'miles_per_day' => 'required|numeric',
        'daily_rate' => 'required|numeric',
        'hourly_rate' => 'required|numeric',
        'weekly_rate' => 'required|numeric',
        'monthly_rate' => 'required|numeric',
        'weekend_rate' => 'required|numeric',
        'status' => 'required|string'
    ]);

    if($validator->fails()){
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $vehicle->update($request->all());
   
    return response()->json([
        'success' => true,
        'vehicle' => $vehicle
    ]);
}

// Optional: Delete vehicle
public function destroy($id)
{
    $vehicle = FleetModel::find($id);
    if(!$vehicle){
        return response()->json(['success' => false, 'message' => 'Vehicle not found'], 404);
    }

    $vehicle->delete();

    return response()->json(['success' => true]);
}

    
public function search(Request $request)
{
    $q = trim($request->q);

    $vehicles = FleetModel::where('make', 'LIKE', "%$q%")
        ->orWhere('model', 'LIKE', "%$q%")
        ->orWhere('license_plate', 'LIKE', "%$q%")
        ->get();

    return response()->json([
        'success' => true,
        'vehicles' => $vehicles
    ]);
}

public function status_search(Request $request)
{
    //dd($request->all());
    $q = trim($request->q);

    $vehicles = FleetModel::where('status', 'LIKE', "%$q%")
        ->get();

    return response()->json([
        'success' => true,
        'vehicles' => $vehicles
    ]);
}

public function category_search(Request $request)
{
    //dd($request->all());
    $q = trim($request->q);
    $vehicles = FleetModel::where('category', 'LIKE', "%$q%")
        ->get();
    return response()->json([
        'success' => true,
        'vehicles' => $vehicles
    ]);
}





}
