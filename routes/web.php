<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class,'index'])->name('home');
//Route::get('/about', [HomePageController::class,'index'])->name('about');

Route::get('/login', [UserAuthController::class,'showLogin'])->name('user.login.show');
Route::post('/login', [UserAuthController::class,'login'])->name('user.login');
Route::get('/logout', [UserAuthController::class,'logout'])->name('user.logout');

Route::get('/register', [UserAuthController::class,'showRegister'])->name('user.register.show');
Route::post('/register', [UserAuthController::class,'register'])->name('user.register');

Route::group(['prefix'=> 'user','middleware'=> 'userAuth'], function () {
    Route::get('upload',[UserUploadController::class,'index'])->name('user.upload.show');
});


//////////AdMIN////////

Route::get('admin/login', [AdminAuthController::class,'showLogin'])->name('admin.login.show');
Route::post('admin/login', [UserAuthController::class,'login'])->name('admin.login');
Route::get('admin/logout', [UserAuthController::class,'logout'])->name('admin.logout');

Route::group(['prefix'=> 'admin','middleware'=> 'adminAuth'], function () {
    Route::get('dashboard',[UserUploadController::class,'dashboard'])->name('admin.dashboard');
});





//Route::get('admin/dashboard', [AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
