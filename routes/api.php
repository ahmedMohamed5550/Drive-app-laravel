<?php

use App\Http\Controllers\Api\DrivesController;
use App\Http\Controllers\authApi\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::post("register",[AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function(){

    Route::get("drives",[DrivesController::class,'index']);

    // store data
    Route::post("drives",[DrivesController::class,'store']);

    // update data
    Route::post("drives/{id}",[DrivesController::class,'update']);

    // delete
    Route::delete("drives/{id}",[DrivesController::class,'destroy']);

    // show
    Route::get("drives/{id}",[DrivesController::class,'show']);

});


