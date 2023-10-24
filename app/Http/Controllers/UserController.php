<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function showprofile(){
        return view('auth.profile');
    }

    public function uploadimage($id,Request $request){

        $user=User::find($id);
        $user_data=$request->file("inputfile");
        if($user_data != null){
            $file_name=time() . $user_data-> getClientOriginalName();
            $location=public_path('./profile/');
            $user_data->move($location,$file_name);
            $user->image=$file_name;
            $user->save();
            return redirect()->back()->with("done","Upload Image Succesfully");
        }
        else{
            return redirect()->back();
        }
    }

    public function changetheem($id){
        $user=User::find($id);
        if($user->theem == 0){
            $user->theem = 1;
        }
        else{
            $user->theem = 0;
        }
        $user->save();
        return redirect()->back();

    }

}


