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
            // 'projects.title',
            // 'seeker.name as reporter',
            // 'provider.name as reported',
            'posts.title'
        )
        // ->join('profiles as seeker', 'seeker.user_id', '=', 'projects.seeker_id')
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
        // $report=report::find($report_id);
        // $report->is_active*=-1;
        // if($report->save())
        //     if($report->is_active==-1)
        //             return back()->with(['message' => 'تم تعطيل البلاغ بنجاح', 'type' => 'alert-success']);
        //         else
        //             return back()->with(['message' => 'تم تفعيل البلاغ بنجاح', 'type' => 'alert-success']);
        // return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);

    }
}
