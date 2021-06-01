<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BooqersController;
use App\Http\Controllers\LoginAppController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Sanctum Auth
Route::group(['middleware' => 'auth:sanctum'], function(){
	// Kota Route
	Route::get("kota/{province_id?}",[CityController::class,'index']);
	Route::get("kota/search/{city_name?}",[CityController::class,'search']);

	// Register Route
	Route::post("daftar",[BooqersController::class,'store']);
	// Route::post("daftar-oauth",[BooqersController::class,'store_oauth']);

	// Login Route
	Route::post("login",[LoginAppController::class,'login']);
	Route::post("login-oauth",[LoginAppController::class,'login_oauth']);

	//Profile Route
	Route::post("profile",[BooqersController::class,'show']);
	Route::put("update-profile/{user_id}",[BooqersController::class,'update']);

	// Buku Route
	Route::post("buku",[BookController::class,'listBook']);
	Route::post("buku-sekitar",[BookController::class,'nearestBook']);
});

Route::post("test",[UserController::class,'index']);