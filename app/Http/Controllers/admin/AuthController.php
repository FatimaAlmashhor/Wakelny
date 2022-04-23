<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    /////////////////show users////////////////
    public function listAll()
    {
        $users = User::where('is_active', 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.users')->with('users', $users);
    }
    ///////////////// show register page//////////////////
    public function create()
    {
        return view('createUser');
    }




    ///////////////// add user //////////////////
    public function register(Request $request)
    {
        Validator::validate($request->all(), [
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'user_pass' => ['required', 'min:5'],
            'confirm_pass' => ['same:user_pass']


        ], [
            'name.required' => 'ادخل الاسم',
            'name.min' => 'يجب ان يكون الاسم اكثر من 3 حروف',
            'email.unique' => 'الايميل موجود مسبقا',
            'email.required' => 'ادخل الايميل',
            'email.email' => 'ادخل الايميل بشكل صحيح',
            'user_pass.required' => 'ادخل كلمة السر',
            'user_pass.min' => 'يجب ام تكون كلمة السر اكثر من 3 خانات',
            'confirm_pass.same' => 'كلمة السرغير متطابقة ',


        ]);
        $name = $request->name;
        $u = new User();
        $u->name = $name;
        $u->password = Hash::make($request->user_pass);
        $u->email = $request->email;
        $token = Str::uuid();
        $u->remember_token = $token;

        if ($u->save()) {
            $u->attachRole('provider');
            $to_name = $request->name;
            $to_email = $request->email;
            $data = array('name' => $request->name, 'activation_url' => URL::to('/') . "/verify_email/" . $token);

            Mail::send('emails.welcome', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('تسجيل عضوية جديدة');
                $message->from('kalefnyinfo@gmail.com', 'كلفني');
            });

            // setup the profile
            $profile = new Profile();
            $profile->name = $name;
            $profile->user_id = $u->id;
            $profile->save();


            return redirect()->route('login')
                ->with(['success' => 'user created successful']);
        }


        return back()->with(['error' => 'can not create user']);
    }
    ///////////////// show hogin page after check role//////////////////

    public function showLogin()
    {
        if (Auth::check())
            return redirect()->route($this->checkRole());
        else
            return view('login');
    }

    /////////////////  check role//////////////////

    public function checkRole()
    {

        if (Auth::user()->hasRole('admin'))
            return 'admin';
        else
            return 'home';
    }
    ///////////////// check account in  hogin page //////////////////

    public function login(Request $request)
    {
        Validator::validate($request->all(), [
            'email' => ['email', 'required', 'min:3', 'max:50'],
            'user_pass' => ['required', 'min:5']


        ], [
            'email.required' => 'ادخل بريدك الالكتروني',
            'email.email' => 'ادخل بؤيدك الالكتروني بشكل صحيح',
            'user_pass.required' => 'اخل كلمة السر',
            'user_pass.min' => 'يجب ان بكون كلمة السر اكبر من 5 خانات',


        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->user_pass, 'is_active' => 1])) {

            if(Auth::user()->hasRole('admin')) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('client.userProfile.userProfile');
                // return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')->with(['message' => 'incorerct username or password or your account is not active ']);
        }
    }
    ///////////////// logout function //////////////////

    public function logout()
    {

        Auth::logout();
        return redirect()->route('login');
    }

    public function verifyEmail($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $user->email_verified_at = Carbon::now()->timestamp;
            $user->save();
            Auth::login($user);
            return redirect()->route('home');
        } else
            echo "invalid token";
    }

}