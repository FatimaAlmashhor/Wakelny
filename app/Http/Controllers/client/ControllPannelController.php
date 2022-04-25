<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use App\Models\Profile;
use App\Models\UserSkills;
use Illuminate\Support\Facades\Auth;

class ControllPannelController extends Controller
{
    //here the defualt function

    function index()
    {
        // give all the categories
        $categories = category::all();

        $profile = Profile::where('user_id', Auth::id())->get();

        // give the roles of the user
        $user = User::find(Auth::id());
        $userRole = 'seeker';
        if ($user->hasRole('provider') && $user->hasRole('seeker')) {
            $userRole = 'both';
        } else if ($user->hasRole('provider')) {
            $userRole = 'provider';
        }

        return view('client.userProfile.controllPannal')->with(['data' => $profile, 'categories' =>  $categories, 'role' => $userRole]);
        // return view('client.userProfile.controllPannal')->with();
    }

    // here the function for the saving the user information
    public function profile_save(Request $request)
    {
        $current_user_id = Auth::user()->id;

        $userRole = false;
        // Auth::user()->roles()->detach();


        if ($request->provider && $request->seeker) {
            Auth::user()->roles()->sync([3, 4]);
            $userRole = true;
        } else if ($request->provider) {
            Auth::user()->roles()->sync([4]);
            $userRole = true;
        } else if ($request->seeker) {
            Auth::user()->roles()->sync([3]);
            $userRole = true;
        } else {
            $userRole = false;
        }

        if ($userRole) {
            Profile::where('user_id', $current_user_id)->update(
                [
                    'job_title' => $request->input('job_title'),
                    'specialization'    =>  $request->input('specialization'),
                    'bio'  =>  $request->input('bio'),
                    'video'  =>  $request->input('video'),
                ]

            );
            return redirect()->route('profile')
                ->with(['message' => '   تم تعديل معلومات الشخصيه بنجاح', 'type' => 'alert-success']);
        } else {
            return redirect()->back()
                ->with(['message' => 'يرجى تحديد نوع الحساب رجاء', 'type' => 'alert-danger']);
        }
    }


    function admin()
    {
        return view('admin.index');
    }

    public function edit_pro()
    {
        $current_user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $current_user_id)->get();
        //  print_r($profile);
        return view('client.userProfile.editUserProfile')
            ->with('data', $profile);
    }


    public function uploadFile($file)
    {
        $dest = public_path() . "/images/";

        //$file = $request->file('image');
        $filename = time() . "_" . $file->getClientOriginalName();
        $file->move($dest, $filename);
        return $filename;
    }
    public function account_save(Request $request)
    {
        $current_user_id = Auth::user()->id;
        // User::where('id', $current_user_id)->update(['name' => $request->input('name')]);

        $filename = $this->uploadFile($request->file('avatar'));

        // $ser->image=$this->uploadFile($request->file('image'));
        Profile::where('user_id', $current_user_id)->update(
            [
                'name' => $request->input('name'),
                'gender'    =>  $request->input('gender'),
                'country'  =>  $request->input('country'),
                'mobile'  =>  $request->input('mobile'),
                'avatar' => $filename,
            ]

        );
        return redirect()->route('account')->with(['message' => 'تم تعديل بياناتك الشخصيه بنجاح', 'type' => 'alert-success']);
    }
}