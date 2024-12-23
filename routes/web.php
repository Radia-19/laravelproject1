<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class,'index'])->name('home');
//Route::get('/about', [HomePageController::class,'index'])->name('about');

Route::get('/login', [UserAuthController::class,'showLogin'])->name('user.login.show');
Route::post('/login', [UserAuthController::class,'login'])->name('user.login');
Route::get('/logout', [UserAuthController::class,'logout'])->name('user.logout');

Route::get('/register', [UserAuthController::class,'showRegister'])->name('user.register.show');
Route::post('/register', [UserAuthController::class,'register'])->name('user.register');


Route::get('admin/dashboard', [AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
