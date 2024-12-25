<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Photo;
use App\Models\Cashout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function buyOutShow()
    {
        $images = Photo::where('status','selling')->latest()->paginate(3);

        return view('admin.buyout',compact('images'));
    }

    public function buyOut(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login'); // Redirect if not authenticated
        }
        DB::transaction(function () use($request){
        $statusArray = ['buy-out','approve-unsellable'];
        $status = $request->status;

        if($request->image_id != null && in_array($status, $statusArray)) {

            $image = Photo::findOrFail($request->image_id);

            if($status == 'buy-out'){
                $image->update([
                    'status' => $status,
                    'buyout_by'=> Auth::guard('admin')->id(),
                    'buyout_date'=> date('Y-m-d H:i:s'),
                    'rate' => (float)$request->rate
                    ]);

                    $getUser = User::findOrFail($request->user_id);

                    $getPrevBalance = (float)$getUser->financial->balance;
                    $newBalance = $getPrevBalance + (float)$request->rate;

                    $getUser->financial()->update([
                        'balance' => $newBalance
                    ]);
                    return redirect()->back();

            }else{
                $image->update([
                    'status' => $status
                    ]);
                return redirect()->back();

            }

        }else{

            return 'Hacked';
        }
        });
    }


    public function showCashouts()
    {

        $cashouts = Cashout::with('user')->latest()->paginate(10);

        return view('admin.cashouts',compact('cashouts'));
    }

    public function updateCashouts($cashout_id = null, $status = null)
    {

        if('cashout_id' && $status){

            $cashout = Cashout::findOrFail($cashout_id);

            $cashout->update([
                'status' =>$status
            ]);

            return redirect()->back();

        }else{
            abort(403);
        }

    }
}

