<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    ////////////////////show report in dashboard///////////
    public function showAll(){
        $reports =  report::select(
            'reports.id',
            'reports.user_id',
            'reports.post_id',
            'reports.provider_id',
            'reports.type_report',
            'reports.massege',
            'profiles.name'
        )->join('profiles', 'profiles.user_id', '=', 'reports.user_id')->where('is_active', 1)->get();


        return view('admin.report.index')->with(['reports'=>$reports ]);

    }
    ////////////////////add new report ///////////

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
    public function toggle($report_id){
        $report=report::find($report_id);
        $report->is_active*=-1;
        if($report->save())
            if($report->is_active==-1)
                    return back()->with(['message' => 'تم تعطيل البلاغ بنجاح', 'type' => 'alert-success']);
                else
                    return back()->with(['message' => 'تم تفعيل البلاغ بنجاح', 'type' => 'alert-success']);
        return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);

    }
}
