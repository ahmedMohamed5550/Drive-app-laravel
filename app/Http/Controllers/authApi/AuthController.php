<?php

namespace App\Http\Controllers\authApi;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        $data =$request->validate([
            'name' =>'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);


        $token=Str::random(64);

        $user=user::create([
            'name' => $data['name'],
            'email' =>$data['email'],
            'password' => bcrypt($data['password']),
            'token' => $token
        ]);


        // $token = $user->createToken('mytoken')->plainTextToken();

        $message=[
            'user'=> $user,
            'token' =>$token,
            'message' => "register done",
            'status' => 200
        ];

        return response($message,200);

    }
}
