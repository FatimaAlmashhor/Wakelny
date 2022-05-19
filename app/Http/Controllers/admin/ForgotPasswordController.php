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
    Validator::validate($request->all(), [
      'email' => ['required', 'email'],
    ], [
      'email.required' => 'ادخل الايميل',
      'email.email' => 'ادخل الايميل بشكل صحيح',
    ]);

    $token = Str::random(64);

    DB::table('password_resets')->insert(
      ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
    );

    try {
      Mail::send('client.user.verify', ['token' => $token], function ($message) use ($request) {
        $message->to($request->email);
        $message->subject('اشعار استعادة  رمز الدخول');
        $message->from('kalefnyinfo@gmail.com', 'متاح');
      });
      $message =  ['message' =>  ' لقد قمنا بارسال رسالة للايميل الخاص بك يرجى التحقق من الايميل!', 'type' => 'alert-success'];

      return redirect()->route('login')->with($message);
    } catch (\Throwable $th) {
      //throw $th;
      return back()->with('message', 'حدث خطأ ما! عاود المحاوله  ');
    }
  }
}