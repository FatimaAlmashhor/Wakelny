<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Posts;
use App\Models\User;
use App\Models\Project;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ReportController extends Controller
{
    ////////////////////show report in dashboard///////////

    public function showAll()
    {
        $reports =  Report::select(
            'reports.id',
            'reports.user_id',
            'reports.provider_id',
            'reports.type_report',
            'reports.massege',
            'reportesr.name as reporter',
            'reporteds.name as reported',
        )
            ->join('profiles as reportesr', 'reportesr.user_id', '=', 'reports.user_id')
            ->join('profiles as reporteds', 'reporteds.user_id', '=', 'reports.provider_id')
            ->where('reports.is_active', 1)
            ->where('project_id', '=', null)
            ->get();

        $reports_project =  Report::select(
            'reports.id as report_id',
            'reports.user_id',
            'reports.post_id',
            'reports.provider_id',
            'reports.type_report',
            'reports.created_at',
            'reports.project_id as project_id',
            'reportesr.name as reporter',
            'posts.title'
        )
            ->join('profiles as reportesr', 'reportesr.user_id', '=', 'reports.user_id')
            ->join('projects', 'projects.id', '=', 'reports.project_id')
            ->join('posts', 'posts.id', '=', 'projects.post_id')
            ->where('project_id', '!=', null)

            ->where('reports.is_active', 1)
            ->groupBy('posts.id')
            ->get();

        $reports_post =  Report::select(
            'reports.id',
            'reports.user_id',
            'reports.type_report',
            'reports.massege',
            'reportesr.name as reporter',
            'posts.title'
        )
            ->join('profiles as reportesr', 'reportesr.user_id', '=', 'reports.user_id')
            ->join('posts', 'posts.id', '=', 'reports.post_id')
            ->where('project_id', '=', null)
            ->where('reports.is_active', 1)
            ->get();

        // return response()->json($reports_project);
        return view('admin.report.index')->with(['reports' => $reports, 'reports_project' => $reports_project, 'reports_post' =>  $reports_post]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'type_report' => ['required'],
            ], [
                'type_report.required' => 'يجب ان تقوم بأدخال  نوع البلاغ',
            ]);



            $report = new report();
            $report->user_id = Auth::id();
            $report->post_id = $request->post_id;
            $report->provider_id = $request->provider_id;
            $report->type_report = $request->type_report;
            $report->massege = $request->massege;




            if ($report->save()) {

                return redirect()->route('freelancers')
                    ->with(['message' => 'تم اضافة بلاغ  بنجاح', 'type' => 'alert-success']);
            } else
                return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        } catch (Expectation   $th) {
        }
    }
    public function toggle($report_id)
    {
        $report = report::find($report_id);
        $report->is_active *= -1;
        if ($report->save())
            if ($report->is_active == -1)
                return back()->with(['message' => 'تم تعطيل البلاغ بنجاح', 'type' => 'alert-success']);
            else
                return back()->with(['message' => 'تم تفعيل البلاغ بنجاح', 'type' => 'alert-success']);
        return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
    }


    // !reporting fatima vision
    function reporting(Request $request)
    {
        try {
            $project_id = $request->project_id;
            // create report
            $report  = new Report();
            $report->massege = $request->massege;
            $report->user_id = Auth::id();



            if ($request->get('type') == 'project') {
                // create report
                $report->project_id = $project_id;
                $report->type_report = 'nonrecevied';
            }

            $report->save();
            return back()->with(['message' => 'تم ارسال رساله بلاغ رجاء انتظر رد الاداره ', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        }
    }


    function reportDetails($project_id)
    {
        $report = Report::where('project_id', $project_id)
            ->join('profiles', 'profiles.user_id', '=', 'reports.user_id')
            ->join('role_user', 'role_user.user_id', '=', 'reports.user_id')

            ->get();

        $project = Project::select(
            'projects.id as project_id',
            'projects.amount',
            'projects.duration',
            'projects.status',
            'projects.post_id as post_id',
            'posts.title'
        )
            ->where('projects.id', $project_id)
            ->join('posts', 'posts.id', '=', 'projects.post_id')
            ->get();

        // return response()->json($project);


        return view('admin.report.reportDetails')->with(['report' => $report, 'project' => $project]);
    }
}