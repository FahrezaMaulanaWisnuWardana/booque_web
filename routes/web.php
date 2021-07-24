<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\BlogCategoryController;
use App\Http\Controllers\Dashboard\BookCategoryController;
use App\Http\Controllers\Dashboard\ProvinceController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\BooqersController;
use App\Http\Controllers\Dashboard\TransactionController;


Route::get('/',[HomeController::class,'index']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/blog/cari',[HomeController::class,'cari']);
Route::get('/blog/{category?}/{slug?}',[HomeController::class,'detailBlog']);
Route::get('/email',[HomeController::class,'mailTemplate']);
// Auth Dashboard
Route::get('/booque-login',[UserController::class,'index']);
Route::post('/proses-login',[UserController::class,'prosesLogin']);
Route::get('/logout',[UserController::class,'logout']);
// Middleware Dashboard
Route::group(['middleware' => ['\App\Http\Middleware\Cek_login']], function () {
    // Dashboard Group
    Route::group(['prefix'=>'dashboard'],function(){
        Route::get('/',[DashboardController::class,'index']);
        // User C R
        Route::get('/user',[DashboardController::class,'users']);
        Route::get('/user-add',[DashboardController::class,'addUser']);
        Route::post('/user-create',[DashboardController::class,'createUser']);
        // User U
        Route::get('/user-edit/{id}',[DashboardController::class,'userEdit']);
        Route::put('/user-update/{id}',[DashboardController::class,'userUpdate']);
        Route::get('/user-p-edit/{id}',[DashboardController::class,'passwordUserEdit']);
        Route::put('/user-p-update/{id}',[DashboardController::class,'passwordUserUpdate']);
        // User D
        Route::delete('/user-delete/{id}',[DashboardController::class,'userDelete']);
        // Blog C R
        Route::get('/blog',[BlogController::class,'blog']);
        Route::get('/tambah-blog',[BlogController::class,'createBlog']);
        Route::post('/add-blog',[BlogController::class,'addBlog']);
        // Blog U
        Route::get('/edit-blog/{id}',[BlogController::class,'editBlog']);
        Route::put('/update-blog/{id}',[BlogController::class,'updateBlog']);
        // Blog D
        Route::delete('/delete-blog/{id}',[BlogController::class,'deleteBlog']);
        // Category C R
        Route::get('/blog-category',[BlogCategoryController::class,'blogCategory']);
        Route::get('/c-blog-category',[BlogCategoryController::class,'createCategoryBlog']);
        Route::post('/a-blog-category',[BlogCategoryController::class,'addCategoryBlog']);
        // Category U
        Route::get('/e-blog-category/{id}',[BlogCategoryController::class,'editCategoryBlog']);
        Route::put('/u-blog-category/{id}',[BlogCategoryController::class,'updateCategoryBlog']);
        // Category D
        Route::delete('/d-blog-category/{id}',[BlogCategoryController::class,'deleteCategoryBlog']);
        
        // Book Category App C R U D
        Route::resource('book-category',BookCategoryController::class);

        // Location
        // Province App C R U D
        Route::resource('province',ProvinceController::class);
        // City App C R U D
        Route::resource('city',CityController::class);
        // End Location
        // Book R U D
        Route::resource('book',BookController::class);
        // Banner C R U D
        Route::resource('banner',BannerController::class);
        // Banner C R U D
        Route::resource('booqer',BooqersController::class);
        // Banner C R U D
        Route::resource('transaksi',TransactionController::class);
        // Generate API KEY
        Route::post('/generate-key',[DashboardController::class,'generateKey']);
        Route::get('/d-key/{id}/{user}',[DashboardController::class,'destroyKey']);
    });
});