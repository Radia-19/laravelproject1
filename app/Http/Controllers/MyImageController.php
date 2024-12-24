<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyImageController extends Controller
{
    public function index(){

       //$userImages = User::findOrFail(Auth::id())->photo()->paginate(10); //ELOQUENT
       //$userImages = User::Auth::user()->photo()->paginate(10); //ELOQUENT

       $userImages = Photo::where('user_id',Auth::id())->paginate(3); //ELOQUENT + QUERY BUILDER
       return view('user.myImages',compact('userImages'));
    }
    // public function store(Request $request )
    // {
    //     $validated = $request->validate([
    //         'name'=> 'required|unique:photos,name',
    //         'details'=> 'required',
    //         'image'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
    //         'status'=> 'required'
    //         ]);

    //     // if(\request()->hasFile('image')){
    //     // }

    //     //$imageName = uniqid().sha1(rand(100,9000)).'.'.request()->file('image')->extension();
    //     //\request()->file('image')->move(public_path('uploads/'),$imageName);
    //     Photo::create([
    //         'user_id'=> Auth::id(),
    //         'name'=> $request->name,
    //         'details' => $request->details,
    //         'image'=> $request->image,
    //         'status'=> $request->status,
    //     ]);
    //     return redirect()->back()->with('okMsg','Uploaded Successfully');
    // }

}
