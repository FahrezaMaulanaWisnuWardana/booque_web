<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\CityController;
use App\Http\Controllers\v1\ProvinceController;
use App\Http\Controllers\v1\BooqersController;
use App\Http\Controllers\v1\LoginAppController;
use App\Http\Controllers\v1\BookController;
use App\Http\Controllers\v1\TransactionController;
use App\Http\Controllers\v1\CategoryController;
use App\Http\Controllers\v1\BannerController;
use App\Http\Controllers\v1\BlogController;

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
	// Group Route
	Route::group(['namespace'=>'v1','prefix'=>'v1'],function(){
		// Province Route
		Route::get("provinsi/{id?}",[ProvinceController::class,'index']);
		Route::get("provinsi/search/{province_name}",[ProvinceController::class,'search']);
		// Kota Route
		Route::get("kota/{province_id?}",[CityController::class,'index']);
		Route::get("kota/search/{city_name}",[CityController::class,'search']);

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
		Route::post("tambah-buku",[BookController::class,'addBook']);
		Route::post("update-buku/{id}",[BookController::class,'updateBook']);
		Route::post("update-status-buku/{id}",[BookController::class,'updateBookStatus']);
		Route::post("buku",[BookController::class,'allBook']);
		Route::post("buku-cari",[BookController::class,'likeBook']);
		Route::post("buku-detail",[BookController::class,'detailBook']);
		Route::delete("hapus-buku/{id}",[BookController::class,'deleteBook']);
		// Transaction
		Route::post("transaksi-buku",[TransactionController::class,'store']);
		Route::post("transaksi-ku/{user_id}",[TransactionController::class,'index']);
		Route::post("transaksi-detail/{user_id}/{trx_id}",[TransactionController::class,'show']);
		// Category 
		Route::post("category/{buku?}/{id?}",[CategoryController::class,'index']);
		// Banner
		Route::get("banner",[BannerController::class,'index']);
		// Blog
		Route::get("blog",[BlogController::class,'index']);
	});
});