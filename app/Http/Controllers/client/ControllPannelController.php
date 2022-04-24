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
    function showSkills()
    {
        $skills = Skill::where('is_active', 1)->get();
        $myskills = UserSkills::join('skills', 'skills.id', '=', 'user_skills.skill_id')->where('user_id', Auth::id())->get(['skills.name', 'user_skills.skill_id']);
        // $myskills = User::with(['skills'])->where('id', Auth::id())->get();
        return view('client.userProfile.editSkills')->with(['skills' => $skills, 'myskills' => $myskills]);
    }
    function saveSkills(Request $request)
    {
        $skills = $request->skills;
        print_r($skills);
        if (blank($skills)) {
            return redirect()->back()->with(['message' => 'Please Add new skills', 'type' => 'alert-danger']);
        } else {
            $needToInsert = false;
            // insert if the skills are new
            foreach ($skills  as $value) {
                $findSkill = UserSkills::where('user_id', Auth::id())->where('skill_id', $value)->get();

                if ($findSkill->isEmpty()) {
                    $message = ['message' => 'Skills added successfuly', 'type' => 'alert-success'];
                    UserSkills::insert(['skill_id' => $value, 'user_id' => Auth::id()]);
                } else {
                    $message = ['message' => 'These skills already exist', 'type' => 'alert-danger'];
                }

                print_r(['skill_id' => $value, 'user_id' => Auth::id()]);
            }

            return redirect()->back()->with($message);
        }
    }

    function deleteSkill($skill_id)
    {
        $skill = UserSkills::where(['skill_id' => $skill_id, 'user_id' => Auth::id()])->delete();

        return redirect()->back()->with(['message' => 'Skills deleted successfuly', 'type' => 'alert-success']);
    }
   public function edit_pro()
    {
        $current_user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $current_user_id)->get();
        //  print_r($profile);
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
