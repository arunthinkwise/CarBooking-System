<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TollManagement extends Controller
{
    public function index(){
        $data['page'] = 'Toll Management';
        $data['pagenav'] = 'Toll Management';
        return view('toll.index')->with($data);
    }
}
