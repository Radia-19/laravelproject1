<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $sliderHead = "Welcome";
    $sliderContent = "This is the welcome page";
    return view('welcome',compact(['sliderHead','sliderContent']));
});
