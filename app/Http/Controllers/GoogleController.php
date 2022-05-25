<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {


        // try {
        $user = Socialite::driver('google')->stateless()->user();
        // return response()->json($request);
        // Check Users Email If Already There
        $is_user = User::where('email', $user->getEmail())->first();

        // check if the user still empty
        // $checkUsers = User::first();
        // if (is_null($checkUsers)) {
        //     $role = 'admin';
        // }

        if (!$is_user) {
            $token = Str::uuid();
            $saveUser = User::updateOrCreate([
                'google_id' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'remember_token' => $token,
                'password' => Hash::make($user->getName() . '@' . $user->getId())
            ]);
            $role = 'seeker';
            // if ($request->role == 'provider')
            // $role = 'provider';
            $saveUser->attachRole($role);
            $saveUser->sendEmailVerificationNotification();
            // 
            $profile = new Profile();
            $profile->name = $user->getName();
            $profile->user_id = $saveUser->id;
            $profile->save();



            if ($role == 'seeker')
                $saveUser->deposit(10000);
        } else {
            $saveUser = User::where('email',  $user->getEmail())->update([
                'google_id' => $user->getId(),
            ]);
            $saveUser = User::where('email', $user->getEmail())->first();
        }

        Auth::loginUsingId($saveUser->id);
        if ($saveUser->hasRole('admin'))
            return redirect()->route('admin');
        else
            return redirect()->route('profile');
        // } catch (\Illuminate\Http\Client\ConnectionException $e) {
        //     return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        // } catch (\Throwable $th) {
        //     return redirect()->route('admin')->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
        // }
    }
}