<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(){
        $data['page'] = 'Driver Management';
        $data['pagenav'] = 'Add Driver';
        return view('driver.index')->with($data);
    }
}
