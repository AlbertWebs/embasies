<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use Illuminate\Support\Facades\Redirect;
use Storage;
use Mail;
use Hash;
use Session;
class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(): View
    {
        return view('welcome');
    }

    public function home(): View
    {
        return view('app.index');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('admin.adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }

    // create post method for trasnfer
    public function transfer(Request $request)
    {
        $title = "Transfer to $request->account_number";
        $type = "Transfers";
        $amount = $request->amount;
        $narrative = "$title: Amount: $amount";
        $user_id = $request->user_id;


        //  Do the math
        $Balances = DB::table('balances')->where('user_id',$user_id)->orderBy('id','DESC')->first();
        $available = $Balances->available;

        if($available >= $amount){
            $updateDetails = array(
                'title' => $title,
                'type' => $type,
                'amount' => $amount,
                'narrative' => $narrative,
                'user_id' => $user_id,
            );
            DB::table('transactions')->insert($updateDetails);
            //Do The Math
            $newBalance = $available - $amount;
            $updateBalance = array(
                'available' => $newBalance,
                'pending' => 0,
            );
            DB::table('balances')->update($updateBalance);
            Session::flash('message', "Transaction Successfully Scheduled");
            return Redirect::back();
        }else{
            Session::flash('messageError', " insufient Balance  ");
            return Redirect::back();
        }

    }



}
