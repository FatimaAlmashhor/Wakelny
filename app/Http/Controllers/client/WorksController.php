<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;
use App\Models\Skill;
use App\Models\User;
use App\Models\WorkSkill;
use App\Models\work;

use App\Models\Posts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;




class WorksController extends Controller
{

    function index(Request $request)
    {
        $works =  work::select(
            'works.id',
            'works.title',
            'works.comple_date',
            'works.main_image',
            'works.link',
            'works.details',
            'profiles.name'
        )->join('profiles', 'profiles.user_id', '=', 'works.user_id')->where('is_active', 1)->where('works.user_id', Auth::id())->get();


        $skill = Skill::where('is_active', 1)->get();
        return view('client.userProfile.myWorks')->with(['works'=>$works, 'skills'=> $skill ]);
    }
    public function create()
    {
        $providers = User::getProviders('', GlobalConstants::ALL, GlobalConstants::ALL);

        $skill = Skill::where('is_active', 1)->get();

        return view('client.userProfile.userWork')->with(['data' => $providers, 'skills' => $skill]);
    }


    public function showDetails($work_id)

    {
        $works = work::where('id', $work_id)->where('is_active', 1)->get();
        $works =  work::select(
            'works.id',
            'works.title',
            'works.comple_date',
            'works.main_image',
            'works.link',
            'works.details',
            'profiles.name',
            'profiles.avatar',
            'profiles.job_title',
            'profiles.user_id'
        )->join('profiles', 'profiles.user_id', '=', 'works.user_id')
        ->where('id', $work_id)->get();

        return view('client.userProfile.detailsWork')->with(['works' => $works, 'work_id' => $work_id]);
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'title' => ['required'],
                'comple_date' => ['required'],

                'details' => ['required'],

                // 'more_file.*' => 'mimes:pdf,xlx,csv,png,jepg,rar',

            ], [
                'title.required' => 'يجب ان تقوم بأدخال عنوان لعملك',

                'comple_date.required' => 'رجاء ادخل تاريخ الانجاز ',

                'details.required' => 'اضف وصف للعمل',

                // 'more_file.mimes' => ' يجب ان يكون pdf,csv,xlx,png,jepg,rar',

            ]);

            $work = new work();
            $work->user_id = Auth::id();

            $work->title = $request->title;
            $work->comple_date = $request->comple_date;
            $work->main_image = $request->hasFile('main_image')?$this->uploadFile($request->file('main_image')):"default.png";
            $work->link = $request->link;
            $work->details = $request->details;



            //  $more_file = [];
            // if ($work->$request->file('more_file')){
            //     foreach($request->file('more_file') as $key => $file)
            //     {
            //         $fileName = time().rand(1,99).'.'.$file->extension();
            //         $file->move(public_path('uploads'), $fileName);
            //         $more_file[]['more_file'] = $fileName;
            //     }
            // }

            // foreach ($more_file as $key => $file) {
            //     work::create($file);
            // }


            if ($work->save()) {

                $skills = $request->skills;
                $needToInsert = false;
                // insert if the skills are new
                if (!blank($skills))
                    foreach ($skills  as $value) {
                        $findSkill = WorkSkill::where('work_id', $work->id)->where('skill_id', $value)->get();

                        if ($findSkill->isEmpty()) {
                            WorkSkill::insert(['skill_id' => $value, 'work_id' =>  $work->id]);
                        }
                    }
                return redirect()->route('myWorks')
                    ->with(['message' => 'تم اضافة عمل جديدة بنجاح', 'type' => 'alert-success']);
                } else
                return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        } catch (Expectation   $th) {
            // throw $th;
            return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        }


    }




    public function edit($work_id){
        $skill = Skill::where('is_active', 1)->get();
        $work=work::find($work_id);

        return view('client.userProfile.userWork')->with(['data' => $work, 'skills' => $skill]);
    }

    public function update(Request $request,$work_id){

    $work=work::find($work_id);
            $work->user_id = Auth::id();
            $work->title = $request->title;
            $work->comple_date = $request->comple_date;
            $work->link = $request->link;
            $work->details = $request->details;
            if($request->hasFile('main_image'))
            $work->main_image=$this->uploadFile($request->file('main_image'));

    if($work->save())
    return redirect()->route('myWorks')->with(['message' => 'تم التعديل بنجاح', 'type' => 'alert-success']);
    return redirect()->back()->with(['message' => 'فشلت عمليه التعديل الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);

    }

    public function toggle($work_id){
        try {
        $work=work::find($work_id);
        $work->is_active*=-1;
        if($work->save())
            // if($work->is_active==-1)

            //         return back()->with(['message' => 'تم تعطيل العمل بنجاح', 'type' => 'alert-success']);
            //     else
                    return redirect()->route('myWorks')->with(['message' => 'تم حذف العمل بنجاح', 'type' => 'alert-success']);
else
        return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
 } catch (Expectation   $th) {
      return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
    }
    }


    public function uploadFile($file){
        $dest=public_path()."/images/";

        //$file = $request->file('image');
        $filename= time()."_".$file->getClientOriginalName();
        $file->move($dest,$filename);
        return $filename;


        }

}
