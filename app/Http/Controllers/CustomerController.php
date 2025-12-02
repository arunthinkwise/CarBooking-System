<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index(){
        $data['page'] = 'Customer Management';
        $data['pagenav'] = 'Add Customer';
        $data['customers'] = Customers::all();
        return view('customer.index')->with($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'drivers_license' => 'required',
            'license_expiry' => 'required|date',
            'dob' => 'required|date',
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
            'notes' => 'nullable'
        ]);
    
        $customer = Customers::create($validated);
    
        return response()->json(['status' => 'success', 'data' => $customer]);
    }
    
    public function fetch()
    {
        return response()->json(Customers::latest()->get());
    }


    public function show($id)
    {
        return response()->json(Customers::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'drivers_license' => 'required',
            'license_expiry' => 'required|date',
            'dob' => 'required|date',
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
            'notes' => 'nullable'
        ]);
    
        Customers::findOrFail($id)->update($validated);
    
        return response()->json(['status' => 'updated']);
    }
    
    public function search(Request $request)
    {
        $q = trim($request->q);
    
        $customers = Customers::where('full_name', 'LIKE', "%$q%")
            ->orWhere('email', 'LIKE', "%$q%")
            ->orWhere('phone', 'LIKE', "%$q%")
            ->orWhere('drivers_license', 'LIKE', "%$q%")
            ->get();
    
        return response()->json([
            'success' => true,
            'customers' => $customers
        ]);
    }
    


}
