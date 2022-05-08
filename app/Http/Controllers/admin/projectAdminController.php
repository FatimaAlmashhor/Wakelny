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
    ////////////////////show report in dashboard///////////
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
// try {
//             $request->validate([
//                 'type_report' => ['required'],


//             ], [
//                 'type_report.required' => 'يجب ان تقوم بأدخال  نوع البلاغ',


//             ]);



//             $report = new report();
//             $report->user_id = Auth::id();
//             $report->post_id = $request->post_id;
//             $report->provider_id = $request->provider_id;
//             $report->type_report = $request->type_report;
//             $report->massege = $request->massege;




//             if ($report->save()) {

//                 return redirect()->route('freelancers')
//                     ->with(['message' => 'تم اضافة بلاغ  بنجاح', 'type' => 'alert-success']);
//             } else
//             return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
//             } catch (Expectation   $th) {

//             }
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
