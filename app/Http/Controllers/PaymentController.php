<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $data['page'] = 'Payment Management';
        $data['pagenav'] = 'Payment Gateway';
        return view('payment.index')->with($data);
    }
}
