<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class ResetPasswordController extends Controller {

  public function getPassword($token) {
      return view('client.user.reset', ['token' => $token]);
  }

  public function updatePassword(Request $request)
  {

  $request->validate([
     'email' => ['required', 'email'],
      'password' => ['required', 'min:5'],
      'password_confirmation' => ['same:password'],

    ], [
      'email.required' => 'ادخل الايميل',
      'email.email' => 'ادخل الايميل بشكل صحيح',
      'password.required' => 'كلمة المرور مطلوبة',
      'password.min' => 'كلمة المرور لا تكون اقل من 5',
      'password_confirmation.same' => 'لا  تتطابق مع كلمة المرور ',


  ]);


      $updatePassword = DB::table('password_resets')
                          ->where(['email' => $request->email, 'token' => $request->token])
                          ->first();

      if(!$updatePassword)
          return back()->withInput()->with('error', 'Invalid token!');

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('login')->with('message', 'رمزك لقد تم تغييرة!');

      }
    }

