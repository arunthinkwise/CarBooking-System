<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $data['page'] = 'Reports';
        $data['pagenav'] = 'All Reports';
        return view('report.index')->with($data);
    }
}
