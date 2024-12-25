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
    public function sendForSale($imageId)
    {
        $image = Photo::findOrFail($imageId);

        if($image->user_id == Auth::id()){

            $image->update([
                  'status' => 'selling'
            ]);
            return redirect()->back();
        }else{
            return 'Hacker Found!';
        }

    }

}
