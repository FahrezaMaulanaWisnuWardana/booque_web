<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BooqersController;
use App\Http\Controllers\LoginAppController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("kota/{province_id?}",[CityController::class,'index']);
Route::get("kota/search/{city_name?}",[CityController::class,'search']);

// Register Route
Route::post("daftar",[BooqersController::class,'store']);
Route::post("daftar-oauth",[BooqersController::class,'store_oauth']);

// Login Route
Route::post("login",[LoginAppController::class,'login']);
Route::post("login-oauth",[LoginAppController::class,'login_oauth']);