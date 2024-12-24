<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function approveShow()
    {
        $pendingImages = Photo::with('user')->where('status','pending')->latest()->paginate(3);
        return view('admin.approval', compact('pendingImages'));
    }

    public function imageApproveStatusUpdate($imageId,$status)
    {
        $image = Photo::findOrFail($imageId);

        if($status == 'approved'){
            $image->update([
                'status' => 'approved',
                'approve_by' => Auth::guard('admin')->id(),
                'approve_date' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back();
        }else if($status == 'declined'){
            $image->update([
                'status' => 'declined'
            ]);
            return redirect()->back();
        }

    }
}
