<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MyImageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserUploadController;
use Illuminate\Support\Facades\Route;


// Home Page
Route::get('/', [HomePageController::class,'index'])->name('home');
//Route::get('/about', [HomePageController::class,'index'])->name('about');

// User Authentication
Route::prefix('user')->group(function () {
Route::get('login', [UserAuthController::class,'showLogin'])->name('user.login.show');
Route::post('login', [UserAuthController::class,'login'])->name('user.login');
Route::get('logout', [UserAuthController::class,'logout'])->name('user.logout');
Route::get('register', [UserAuthController::class,'showRegister'])->name('user.register.show');
Route::post('register', [UserAuthController::class,'register'])->name('user.register');
});

// User Functionality
//Route::group(['prefix' => 'user', 'middleware' => 'userAuth'], function () {
//Route::prefix('user')->group(function () {
    Route::get('upload',[UserUploadController::class,'index'])->name('user.upload.show');
    Route::post('upload',[UserUploadController::class,'upload'])->name('user.upload');
    Route::get('myimages',[MyImageController::class,'index'])->name('user.myImages.show');
    Route::get('myimages/send-for-sale/{imageId}',[MyImageController::class,'sendForSale'])->name('user.myImages.sale');

//});

// Admin Authentication
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class,'showLogin'])->name('admin.login.show');
    Route::post('login', [AdminAuthController::class,'login'])->name('admin.login');
    Route::get('logout', [AdminAuthController::class,'logout'])->name('admin.logout');
    });

// Admin Functionality
//Route::group(['prefix' => 'admin', 'middleware' => 'adminAuth'], function () {
Route::prefix('admin')->group(function () {
    Route::get('dashboard',[AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::get('approval',[AdminDashboardController::class,'approveShow'])->name('admin.approval.show');
    Route::get('approval/updatestatus/{imageId}/{status}',[AdminDashboardController::class,'imageApproveStatusUpdate'])->name('admin.approval.update');
});





//Route::get('admin/dashboard', [AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
