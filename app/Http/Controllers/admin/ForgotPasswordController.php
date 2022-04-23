<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class ForgotPasswordController extends Controller
{
    //
    public function getEmail()
  {
      return view('client.user.email');
  }

    public function postEmail(Request $request)
  {
    $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $token = Str::random(64);

      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('client.user.verify', ['token' => $token], function($message) use($request){
        $message->to($request->email);
        $message->subject('اشعار استعادة  رمز الدخول');
        $message->from('kalefnyinfo@gmail.com', 'كلفني');

      });

      return back()->with('message', 'لقد قمنا بارسال رسالة للايميل الخاص بك!');
  }
}
