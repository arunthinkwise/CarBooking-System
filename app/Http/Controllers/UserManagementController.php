<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(){
        $data['page'] = 'User Management';
        $data['pagenav'] = 'User Management';
        return view('user.index')->with($data);
    }
}
