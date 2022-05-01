<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class settingUserController extends Controller
{
     public function show(){
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index')->with('users', $users);
    }


//     public function store(Request $request)
//     {

//    Validator::validate($request->all(),[
//     'name' => ['required','max:25'],
//     'is_active' => ['required'],


// ],[
//     'name.required' => 'ادخل اسم المهارة',
//     'name.max' => 'يجب ان يكون الاسم اقل من 25 حروف',
// ]);

// $skill=new Skill();
// $skill->name=$request->name;
// $skill->is_active=$request->is_active;


// if($skill->save())
// return redirect()->route('list_skills')
// ->with(['message' => 'تم اضافة مهارة جديدة بنجاح', 'type' => 'alert-success']);
// return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
// }

public function edit($user_id){
    $users=User::find($user_id);
    // $users->isban*=-1;
    // $users->save();
    return view('admin.users._formUserBlock')->with(['data' =>$users ]);
}

public function ban($user_id){
    $user=User::find($user_id);
    if($user->is_active == 1)
        $user->is_active = 0;
    else
        $user->is_active = 1;

    $user->save();
    return back();
        // if($user->isban == 0)

                // return back()->with(['message' => 'تم حظر المستخدم بنجاح', 'type' => 'alert-success']);
        // return back();

                // return back()->with(['message' => 'تم فك حظر المستخدم بنجاح', 'type' => 'alert-success']);
    // return back()->with(['message' => 'فشلت عمليه الحظر الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
}

}
