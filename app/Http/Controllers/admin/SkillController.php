<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Validator;


class SkillController extends Controller
{


    public function list_skills(){
        $skills = Skill::get();
        return view('admin.skills.index')->with('skills', $skills);
    }
    public function add_skill(){

        return view('admin.skills._form');
    }

    public function store(Request $request)
    {

   Validator::validate($request->all(),[
    'name' => ['required','max:25'],
    'is_active' => ['required'],


],[
    'name.required' => 'ادخل اسم المهارة',
    'name.max' => 'يجب ان يكون الاسم اقل من 25 حروف',
]);

$skill=new Skill();
$skill->name=$request->name;
$skill->is_active=$request->is_active;


if($skill->save())
return redirect()->route('list_skills')
->with(['message' => 'تم اضافة مهارة جديدة بنجاح', 'type' => 'alert-success']);
return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
}

public function edit($skill_id){
    $skill=Skill::find($skill_id);
    return view('admin.skills._form')->with(['data' =>$skill ]);
}

public function update(Request $request,$skill_id){

$skill=Skill::find($skill_id);
$skill->name=$request->name;
$skill->is_active=$request->is_active;

if($skill->save())
return redirect()->route('list_skills')->with(['message' => 'تم التعديل بنجاح', 'type' => 'alert-success']);
return redirect()->back()->with(['message' => 'فشلت عمليه التعديل الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);

}

public function toggle($skill_id){
    $skill=Skill::find($skill_id);
    $skill->is_active*=-1;
    if($skill->save())
        if($skill->is_active==-1)
                return back()->with(['message' => 'تم تعطيل المهارة بنجاح', 'type' => 'alert-success']);
            else
                return back()->with(['message' => 'تم تفعيل المهارة بنجاح', 'type' => 'alert-success']);
    return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);

}

}
