<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Validator;


class SkillController extends Controller
{
  

    public function listAll(){
        $skills=Skill::all();
        return view('admin.skills')->with('skills', $skills);
    }
    public function create(){
       
        return view('admin.create_skill');
    }

    public function store(Request $request)
    {

   Validator::validate($request->all(),[
    'name' => ['required','max:55'],
    'level' => ['required','max:15'],
    'is_active' => ['required'],


],[
    'name.required' => 'Name of skill is required',
    'name.max' => 'Name of skill should not be greater than 55 characters.',
    'level.required'=>'level is required',
    'level.max'=>'level should not be max  15',

]); 

$skill=new Skill();
$skill->name=$request->name;
$skill->level=$request->level;
$skill->is_active=$request->is_active;


if($skill->save())
return redirect()->route('skills')
->with(['success'=>'skill created successful']);
return back()->with(['error'=>'can not create skill']);
}

public function edit($skill_id){
    $skill=Skill::find($skill_id);
 

    return view('admin.edit_skill')->with(['skill' =>$skill ]);
}

public function update(Request $request,$skill_id){
   
$skill=Skill::find($skill_id);
$skill->name=$request->name;
$skill->level=$request->level;
$skill->is_active=$request->is_active;

if($skill->save())
return redirect()->route('skills')->with(['success'=>'data updated successful']);
return redirect()->back()->with(['error'=>'can not update data ']);

}

public function toggle($skill_id){
    $skill=Skill::find($skill_id);
    $skill->is_active*=-1;
    if($skill->save())
    return back()->with(['success'=>'data updated successful']);
    return back()->with(['error'=>'can not update data']);

}

}
