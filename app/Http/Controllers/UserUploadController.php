<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserUploadController extends Controller
{
    public function index()
    {
        return view('user.upload');
    }
}
