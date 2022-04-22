<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
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
        $myskills = UserSkills::join('skills', 'skills.id', '=', 'user_skills.skill_id')->where('user_id', Auth::id())->get(['skills.name']);
        // $myskills = User::with(['skills'])->where('id', Auth::id())->get();
        return view('client.userProfile.editSkills')->with(['skills' => $skills, 'myskills' => $myskills]);
    }
    function saveSkills(Request $request)
    {
        $skills = $request->skills;
        if (empty($skills)) {
            return redirect()->back()->with(['message' => 'Please Add skills', 'type' => 'alert-danger']);
        } else {
            $needToInsert = false;
            // insert if the skills are new 
            foreach ($skills  as $item => $value) {
                $findSkill = UserSkills::where('user_id', Auth::id())->where('skill_id', $value)->get();
                if ($findSkill->isEmpty()) {
                    $data[$value] = array(
                        'skill_id' => $value,
                        'user_id' => Auth::id()
                    );
                    UserSkills::insert($data);
                }
            }

            return redirect()->back()->with(['message' => 'Skills added successfuly', 'type' => 'alert-success']);
        }
    }
}