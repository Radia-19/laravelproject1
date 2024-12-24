<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserUploadController extends Controller
{
    public function index()
    {
        return view('user.upload');
    }

    public function upload(Request $request )
    {
        $validated = $request->validate([
            'name'=> 'required|unique:photos,name',
            'details'=> 'required',
            'image'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status'=> 'required'
            ]);

        // if(\request()->hasFile('image')){
        // }

        $imageName = uniqid().sha1(rand(100,9000)).'.'.request()->file('image')->extension();
        \request()->file('image')->move(public_path('uploads/'),$imageName);
        Photo::create([
            'user_id'=> Auth::id(),
            'name'=> $request->name,
            'details' => $request->details,
            'image'=> $imageName,
            'status'=> $request->status,
        ]);
        return redirect()->back()->with('okMsg','Uploaded Successfully');
    }

}
