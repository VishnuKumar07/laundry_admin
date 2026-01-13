<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtpLog;

class LogController extends Controller
{
    public function SmsLogs(Request $request)
    {
        $smslogs = OtpLog::with('user')->where('channel', 'sms')->orderBy('id', 'desc')->get();
        return view('logs.smslog',compact('smslogs'));
    }

    public function EmailLogs(Request $request)
    {
        $emaillogs = OtpLog::with('user')->where('channel', 'email')->orderBy('id', 'desc')->get();
        return view('logs.emaillog',compact('emaillogs'));
    }
}
