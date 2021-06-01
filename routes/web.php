<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


Route::get('/',[HomeController::class,'index']);

// Auth Dashboard
Route::get('/booque-login',[UserController::class,'index']);
Route::post('/proses-login',[UserController::class,'prosesLogin']);
Route::get('/logout',[UserController::class,'logout']);
// Middleware Dashboard
    Route::group(['middleware' => ['\App\Http\Middleware\Cek_login']], function () {
        Route::get('/dashboard',[DashboardController::class,'index']);
        Route::get('/dashboard/user',[DashboardController::class,'users']);

        // Generate API KEY
        Route::post('/generate-key',[DashboardController::class,'generateKey']);
    });