<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
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
        return view('client.static.home');
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
          ->with('data',$profile);
    }

      public function uploadFile($file){
        $dest=public_path()."/images/";

        //$file = $request->file('image');
        $filename= time()."_".$file->getClientOriginalName();
        $file->move($dest,$filename);
        return $filename;


    }
     public function account_save(Request $request){
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
        return redirect()->route('account')
            ->with('success','profile updated successfully');
    }
}
