<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(){
        $data['page'] = 'Analytics';
        $data['pagenav'] = 'Show Analytics';
        return view('analytics.index')->with($data);
    }
}
