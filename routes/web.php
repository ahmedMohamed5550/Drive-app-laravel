<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DrivesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'verify' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admin');


Route::get('gotologinadminpage', [App\Http\Controllers\AdminController::class, 'gotologinadminpage'])->name('admin.loginpage');

Route::post('checkadminlogin', [App\Http\Controllers\AdminController::class, 'checkadminlogin'])->name('admin.login');



// Route::middleware('verified')->group(function(){
    Route::prefix("drive")->group(function(){

        Route::get("showprofile",[UserController::class,'showprofile'])->name("user.showprofile");

        Route::post("uploadimage/{id}",[UserController::class,'uploadimage'])->name("user.uploadimage");

        Route::get("changetheem/{id}",[UserController::class,'changetheem'])->name("user.changetheem");


        Route::get("index",[DrivesController::class,'index'])->name("drives.index");
        Route::get("create",[DrivesController::class,'create'])->name("drives.create");
        Route::get("publicfiles",[DrivesController::class,'publicfiles'])->name("drives.publicfiles");
        Route::get("edit/{id}",[DrivesController::class,'edit'])->name("drives.edit");
        Route::get("destroy/{id}",[DrivesController::class,'destroy'])->name("drives.destroy");
        Route::get("changeStatus/{id}",[DrivesController::class,'changeStatus'])->name("drives.changeStatus");
        Route::get("show/{id}",[DrivesController::class,'show'])->name("drives.show");
        Route::get("showpublicfiles/{id}",[DrivesController::class,'showpublicfiles'])->name("drives.showpublicfiles");
        Route::post("store",[DrivesController::class,'store'])->name("drives.store");
        Route::post("update/{id}",[DrivesController::class,'update'])->name("drives.update");
        Route::get("download/{id}",[DrivesController::class,'downloadfile'])->name("drives.download");


    });
// });
