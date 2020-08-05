<?php

namespace App\Http\Controllers;

use App\Mail\ApproveMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApproveUsersController extends Controller
{
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
