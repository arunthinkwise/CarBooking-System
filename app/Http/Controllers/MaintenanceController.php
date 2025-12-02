<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(){
        $data['page'] = 'Maintenance & Repairs';
        $data['pagenav'] = 'Maintenance & Repairs';
        return view('maitenance.index')->with($data);
    }
}
