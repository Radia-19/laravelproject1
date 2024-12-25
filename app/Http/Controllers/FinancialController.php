<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cashout;
use App\Models\Financial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancialController extends Controller
{
    public function index()
    {
        $myFinancial = Auth::user()->financial;

        $myCashouts = Auth::user()->cashout()->paginate(10);

        return view('user.financial',compact('myFinancial','myCashouts'));
    }
    public function cashout(Request $request)
    {
        $user = Auth::user();

        if($user->financial && ($user->financial->balance > 10)){

            $currentBalance = $user->financial->balance;

            $user->cashout()->create([
                'financial_id' => $user->financial->id,
                'amount' => $currentBalance,
            ]);

            $user->financial()->update([
                'balance'=> (float)0.00
            ]);

            return redirect()->back();

        }else{
            return abort(403);
        }


     }

}


//$myFinancial = User::findOrFail(Auth::id())->financial;
