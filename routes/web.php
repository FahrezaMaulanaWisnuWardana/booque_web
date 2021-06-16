<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;


Route::get('/',[HomeController::class,'index']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/blog/{category?}/{slug?}',[HomeController::class,'detailBlog']);
Route::get('/email',[HomeController::class,'mailTemplate']);

// Auth Dashboard
Route::get('/booque-login',[UserController::class,'index']);
Route::post('/proses-login',[UserController::class,'prosesLogin']);
Route::get('/logout',[UserController::class,'logout']);

// Middleware Dashboard
Route::group(['middleware' => ['\App\Http\Middleware\Cek_login']], function () {
    Route::get('/dashboard',[DashboardController::class,'index']);

    // User
    Route::get('/dashboard/user',[DashboardController::class,'users']);
    Route::get('/dashboard/user-add',[DashboardController::class,'addUser']);
    Route::post('/dashboard/user-create',[DashboardController::class,'createUser']);

    Route::delete('/dashboard/user-delete/{id}',[DashboardController::class,'userDelete']);
    
    Route::get('/dashboard/user-edit/{id}',[DashboardController::class,'userEdit']);
    Route::put('/dashboard/user-update/{id}',[DashboardController::class,'userUpdate']);

    Route::get('/dashboard/user-p-edit/{id}',[DashboardController::class,'passwordUserEdit']);
    Route::put('/dashboard/user-p-update/{id}',[DashboardController::class,'passwordUserUpdate']);

    // Blog
    Route::get('/dashboard/blog',[BlogController::class,'blog']);
    Route::get('/dashboard/tambah-blog',[BlogController::class,'createBlog']);
    Route::post('/dashboard/add-blog',[BlogController::class,'addBlog']);

    Route::delete('/dashboard/delete-blog/{id}',[BlogController::class,'deleteBlog']);

    Route::get('/dashboard/edit-blog/{id}',[BlogController::class,'editBlog']);
    Route::put('/dashboard/update-blog/{id}',[BlogController::class,'updateBlog']);

    // Category
    Route::get('/dashboard/blog-category',[BlogCategoryController::class,'blogCategory']);
    Route::get('/dashboard/c-blog-category',[BlogCategoryController::class,'createCategoryBlog']);
    Route::post('/dashboard/a-blog-category',[BlogCategoryController::class,'addCategoryBlog']);

    Route::delete('/dashboard/d-blog-category/{id}',[BlogCategoryController::class,'deleteCategoryBlog']);

    Route::get('/dashboard/e-blog-category/{id}',[BlogCategoryController::class,'editCategoryBlog']);
    Route::put('/dashboard/u-blog-category/{id}',[BlogCategoryController::class,'updateCategoryBlog']);
    
    // Generate API KEY
    Route::post('/generate-key',[DashboardController::class,'generateKey']);
});