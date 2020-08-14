<?php

namespace App\Http\Controllers;

use App\Mail\ApproveMail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApproveUsersController extends Controller
{   public function __construct()
{
      $this->middleware(function ($request, $next) {
 // fetch session and use it in entire class with constructor
        //  dd(\session()->all());
        $info = session()->has('cod_ok');
         $info==true ? print_r('ok'):Redirect::to('/login')->send();;
         return $next($request);
    });


}
public function redirect(){
    return redirect('/login');
}
public function verify(){

    dd(Session::all());
    return Session::has('valid');
}
    public function index()
    {
        return view ('approve_users');
    }

    public function approve(Request $request)
    {
        $userID = $request->hidden_id;
        $userEmail = $request->hidden_email;

        $this->updateIsApprovedInDatabase($userID);
        $this->sendApproveEmail($userEmail);

        return view("/approve_users");
    }

    public function updateIsApprovedInDatabase($userID)
    {
        DB::table('users')
            ->where('id', $userID)
            ->update(['isApproved' => "1"]);
    }

    public function sendApproveEmail($userEmail)
    {
        $userEmail = urldecode($userEmail); // Transform from abcd%40gmail.com to abcd@gmail.com
        Mail::to($userEmail)->send(new ApproveMail());
    }
}
