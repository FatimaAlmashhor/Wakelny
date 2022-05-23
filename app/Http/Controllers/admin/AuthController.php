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
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Notifications\Messages\MailMessage;

class AuthController extends Controller
{
    /////////////////show users////////////////
    public function listAll()
    {
        $users = User::where('is_active', 1)
            ->get();
        return view('admin.users')->with('users', $users);
    }
    ///////////////// show register page//////////////////
    public function create()
    {
        return view('createUser');
    }



    // this function show the the verfiy message
    public function show()
    {
        return view('client.user.verify-email');
    }


    // send notification for the laravel
    public function request()
    {
        auth()->user()->sendEmailVerificationNotification();

        return back()
            ->with(['message' => 'تم ارسال رسال التأكيد ', 'type' => 'alert-success']);
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('profile')->with(['message' => 'تم تأكيد الحساب بنجاح ! انطلق ', 'type' => 'alert-success']);; // <-- change this to whatever you want
    }


    // public function handle()
    // {
    //     //

    //     event(new Registered($user));
    // }
    ///////////////// add user //////////////////
    public function register(Request $request)
    {
        // try {
        Validator::validate($request->all(), [
            'name' => ['required', 'min:8', 'max:50', /*'regex:/[a-z]/' , 'regex:/[A-Z]/' */],
            'email' => ['required', 'email', 'unique:users,email'],
            'user_pass' =>  ['required', 'min:8', 'max:20', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
            'confirm_pass' => ['same:user_pass']

        ], [
            'name.required' => 'ادخل الاسم',
            // 'name.regex' => 'يجب ان يحتوي على حروف كبيرة "A-Z"وصغيرة"a-z" ',
            'name.min' => 'يجب ان يكون الاسم اكثر من 8 حروف',
            'email.unique' => 'الايميل موجود مسبقا',
            'email.required' => 'ادخل الايميل',
            'email.email' => 'ادخل الايميل بشكل صحيح',
            'user_pass.required' => 'ادخل كلمة السر',
            'user_pass.min' => 'يجب ام تكون كلمة السر اكثر من 8 خانات',
            'user_pass.max' => 'يجب ام تكون كلمة السر اقل من 20 خانات',
            'user_pass.regex' => 'كلمه المرور يجيب ان تحتوي على حروف كبيره وصغيره وارقام اورموز ',
            'confirm_pass.same' => 'كلمة السر غير متطابقة ',


        ]);

        $role = 'seeker';
        // check if the user still empty
        $checkUsers = User::first();
        if (is_null($checkUsers)) {
            $role = 'admin';
        }

        $name = $request->name;
        $u = new User();
        $u->name = $name;
        $u->password = Hash::make($request->user_pass);
        $u->email = $request->email;
        $token = Str::uuid();
        $u->remember_token = $token;


        if ($u->save()) {
            // try {
            $u->attachRole($role);
            $to_name = $request->name;
            $to_email = $request->email;
            $data = array('name' => $request->name, 'activation_url' => URL::to('/') . "/verify_email/" . $token);

            // Mail::send('emails.welcome', $data, function ($message) use ($to_name, $to_email) {
            //     $message->to($to_email, $to_name)
            //         ->subject('تسجيل عضوية جديدة');
            //     $message->from('kalefnyinfo@gmail.com', 'كلفني');
            // });
            $u->sendEmailVerificationNotification();
            // $u->notify(new VerifyEmail);
            // if the user not admin
            if ($role !== 'admin') {
                // setup the profile
                $profile = new Profile();
                $profile->name = $name;
                $profile->user_id = $u->id;
                $profile->save();


                if ($u->hasRole('seeker'))
                    $u->deposit(10000);
            }




            return redirect()->route('login')
                ->with(['message' => 'تم انشاء حسابك بنجاح', 'type' => 'alert-success']);
            // } catch (\Throwable $th) {
            //     return back()->with(['message' => 'فشلت عمليه تسجيل دخولك رجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
            // }
        }


        return back()->with(['message' => 'فشلت عمليه تسجيل دخولك رجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        // } catch (\Exception $th) {
        //     return back()->with(['message' => 'فشلت عمليه تسجيل دخولك رجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        // }
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
            'email' => ['email', 'required'],
            'user_pass' => ['required']


        ], [
            'email.required' => 'ادخل بريدك الالكتروني',
            'email.email' => 'ادخل بريدك الالكتروني بشكل صحيح',
            'user_pass.required' => 'ادخل كلمة السر',



        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->user_pass, 'is_active' => 1])) {

            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('profile');
                // return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')->with(['message' => 'يرجى التحقق من الايميل وكلمة السر ',  'type' => 'alert-danger']);
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
            return redirect()->route('profile')->with(['message' => 'تم تفعيل حسابك بنجاح', 'type' => 'alert-success']);;
        } else
            echo "invalid token";
    }
    // start change password

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',


        ], [
            'old_password.required' => 'ادخل كلمة السر القديمة ',
            'new_password.confirmed' => 'الكلمة ليست متطابقة',
            'new_password.required' => 'ادخل كلمة السر الجديدة',



        ]);



        #Match The Old Password


        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "الكلمة القديمة ليست صحيحة!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);


        return back()->with("status", "تم تغيير كلمة السر بنجاح!");
    }
    // end change password
}
