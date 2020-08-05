<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApproveUsersController extends Controller
{
    public function index()
    {
        return view ('approve_users');
    }

    public function approve(Request $request)
    {
        $userID = $request->hidden_approve_btn;
        dd($userID);

        DB::table('users')
            ->where('id', $userID)
            ->update(['isApproved' => "1"]);

        return view("approve_users");
    }



}
