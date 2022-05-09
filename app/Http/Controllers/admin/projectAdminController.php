<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectAdmin;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class projectAdminController extends Controller
{
    ////////////////////show Projects in dashboard///////////
    public function showAll(){
        // $reported = User::where('is_active', 1)->get();
        $projects =  Project::select(
            'projects.id',
            'projects.stated_at',
            'projects.duration',
            'projects.status',
            'projects.amount',
            'reportesr.name as reporter',
            'reporteds.name as reported',
            // 'projects.title',
            //  'projects.seeker_id ',
            //  'projects.user_id ',
            'posts.title'
        )
        ->join('profiles as reportesr', 'reportesr.user_id', '=', 'projects.seeker_id')
        ->join('profiles as reporteds', 'reporteds.user_id', '=', 'projects.provider_id')
        // ->join('profiles ', 'profiles.user_id', '=', 'projects.seeker_id')
        // ->join('profiles as provider', 'provider.user_id', '=', 'projects.id')
        ->join('posts', 'posts.id', '=', 'projects.post_id')
        ->where('posts.is_active', 1)->get();
        // return  response()->json($projects);

        return view('admin.project.index')->with(['project'=>$projects]);
    }
    ////////////////////add new report ///////////

    public function store(Request $request)
    {


    }
    public function toggle($report_id){

    }
}
