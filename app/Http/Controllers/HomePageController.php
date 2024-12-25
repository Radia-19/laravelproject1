<?php

namespace App\Http\Controllers;
use App\Models\Photo;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $sliderHead = "Foto Sell For Photographers";
        $sliderContent = "Photography is a way to freeze time, to tell a story, to capture a moment and hold it in your hands";

        //Photo::where('name','like','%'. $randomImages .'%');


        $randomImages = Photo::with('user')
                        ->inRandomOrder()
                        ->paginate(20);

        return view('welcome',compact(['sliderHead','sliderContent','randomImages']));
    }
}
