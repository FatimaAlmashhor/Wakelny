<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class ResetPasswordController extends Controller
{

  public function getPassword($token)
  {
    return view('client.user.reset', ['token' => $token]);
  }

  public function updatePassword(Request $request)
  {

    $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required', 'min:8', 'max:20', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
      'password_confirmation' => ['same:password'],

    ], [
      'email.required' => 'ادخل الايميل',
      'email.email' => 'ادخل الايميل بشكل صحيح',
      'password.required' => 'كلمة المرور مطلوبة',
      'password.min' => 'كلمة المرور لا تكون اقل من 8',
      'password.regex' => 'يجب ام تكون كلمة السر تحتوي على حروف صغيرة "a=z" وحروف كبيرة "A-Z" وارقام"0-9"ورموز"@$!%*#?&" ',
      'password_confirmation.same' => 'كلمة السر غير متطابقة ',


    ]);


    $updatePassword = DB::table('password_resets')
      ->where(['email' => $request->email, 'token' => $request->token])
      ->first();

    if (!$updatePassword)
      return back()->withInput()->with('error', 'Invalid token!');

    $user = User::where('email', $request->email)
      ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email' => $request->email])->delete();

    return redirect('login')->with(['message' => 'تم تغير كلمه المرور بنجاح ', 'type' => 'alert-success']);
  }
}