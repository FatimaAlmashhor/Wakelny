<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profile;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

 
    public function add_profile(){
       
        return view('client.profiles._form');
    }

 

  public function store(Request $request)
    {

   Validator::validate($request->all(),[
    'account_type' => ['required'],
    'majoring' => ['required'],
    'career_field' => ['required','max:25'],
    'bio' => ['required','max:255'],
    'video' => 'required',
  


],[
    'account_type.required' => 'account_type of profile is required',
    'majoring.required' => 'account_type of profile is required',
    'career_field.required'=>'career_field is required',
    'career_field.max'=>'career_field should not be max  25',
    'bio.required'=>'bio is required',
    'bio.max'=>'bio should not be max  255',
    'video.required' => 'account_type of profile is required',


]); 

$profile=new profile();
$profile->account_type = $request->account_type;
$profile->majoring=$request->majoring;
$profile->career_field=$request->career_field;
$profile->bio=$request->bio;
$profile->video=$request->video;

if($profile->save())
return redirect()->route('add_profile')
->with(['success'=>'profile created successful']);
return back()->with(['error'=>'can not create profile']);
}

public function edit($profile_id){
    $profile=profile::find($profile_id);
    return view('client.profiles._form')->with(['data' =>$profile ]);
}

public function update(Request $request,$profile_id){
   
$profile=profile::find($profile_id);
$profile->account_type['account_type']=$request->account_type['account_type'];
$profile->majoring=$request->majoring;
$profile->career_field=$request->career_field;
$profile->bio=$request->bio;
$profile->video=$request->video;

if($profile->save())
return redirect()->route('add_profile')->with(['success'=>'data updated successful']);
return redirect()->back()->with(['error'=>'can not update data ']);

}  


}
