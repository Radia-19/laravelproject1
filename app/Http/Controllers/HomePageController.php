<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $sliderHead = "Welcome";
        $sliderContent = "Small Data";
        return view('welcome',compact(['sliderHead','sliderContent']));
    }
}
