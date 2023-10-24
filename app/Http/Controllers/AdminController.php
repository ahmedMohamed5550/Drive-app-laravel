<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard(){
        return view('dashboard');
    }

    public function gotologinadminpage(){
        return view('auth.adminlogin');
    }

    public function checkadminlogin(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt([
            'email' => $request-> email,
            'password' => $request->password
        ])){
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('admin.loginpage');
        }
    }

}
