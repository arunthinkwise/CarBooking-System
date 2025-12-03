<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        return back()->with('error','Invalid email or password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

  
}
