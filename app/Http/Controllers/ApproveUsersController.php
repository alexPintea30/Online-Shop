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

    public function updateIsApprovedInDatabase($userID)
    {
        DB::table('users')
            ->where('id', $userID)
            ->update(['isApproved' => "1"]);
    }

    public function sendNotifyingEmail($userEmail)
    {
        $userEmail = urldecode($userEmail); // Transform from abcd%40gmail.com to abcd@gmail.com


    }

    public function approve(Request $request)
    {
        $userID = $request->hidden_id;
        $userEmail = $request->hidden_email;

        //$this->updateIsApprovedInDatabase($userID);
        $this->sendNotifyingEmail($userEmail);

        return view("/approve_users");
    }



}
