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
        $profile = Profile::where('user_id', Auth::id())->get();
        // print_r($profile);
           return view('client.userProfile.account')
          ->with('data',$profile);
    }
    // update profile
    //  public function update_pro(Request $request,$user_id){
    //     $profile = Profile::where('user_id', Auth::id())->first();
    //     $profile->name=$request->name;
    //     $profile->gender=$request->gender;
    //     $profile->country=$request->country;
    //      $profile->mobile=$request->mobile;

    //     if($request->hasFile('avatar'))
    //     $profile->avatar=$this->uploadFile($request->file('avatar'));
    //     if($profile->save())
    //     return redirect()->route('account')->with(['success'=>'data updated successful']);
    //     return redirect()->back()->with(['error'=>'can not update data ']);



    // }
    //   public function uploadFile($file){
    //     $dest=public_path()."/images/";

    //     //$file = $request->file('image');
    //     $filename= time()."_".$file->getClientOriginalName();
    //     $file->move($dest,$filename);
    //     return $filename;


    // }
     public function account_save(Request $request){
        $current_user_id = Auth::user()->id;
        // User::where('id', $current_user_id)->update(['name' => $request->input('name')]);
    //  $filename = $this->saveImage($request->avatar, 'images/profiles');

        // $ser->image=$this->uploadFile($request->file('image'));
        Profile::where('user_id', $current_user_id)->update(
            [
                'name' => $request->input('name'),
                'gender'    =>  $request->input('gender'),
                'country'  =>  $request->input('country'),
                'mobile'  =>  $request->input('mobile'),
                //  'avatar' => $filename,
            ]

        );
        return redirect()->route('account')
            ->with('success','profile updated successfully');
    }
}
