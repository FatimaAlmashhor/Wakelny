<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\payment\PaymentController;
use App\Models\Evaluation;
use App\Models\Posts;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Report;
use App\Models\User;
use App\Notifications\MarkAsAcceptReceviceNotification;
use App\Notifications\MarkAsDoneNotification;
use App\Notifications\MarkAsRejectReceviceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyWorkOnProjectController extends Controller
{

    // this function show the my cuurent work table
    function index()
    {
        try {
            $data = Project::select(
                'posts.id as post_id',
                'posts.title',
                'posts.description',
                'projects.duration',
                'projects.id as project_id',
                'projects.seeker_id as seeker_id',
                'projects.stated_at',
                'projects.status',
                'projects.totalAmount as amount',
                'projects.payment_status',
            )
                ->join('posts', 'posts.id', '=', 'projects.post_id')
                ->join('profiles', 'profiles.user_id', '=', 'projects.seeker_id')

                ->where('projects.status', 'at_work')
                ->orWhere('projects.status', 'done')
                ->orWhere('projects.status', 'nonrecevied')
                ->where('posts.is_active', 1)
                ->where('projects.provider_id', Auth::id())
                ->where('projects.finshed', 0)

                ->get();
            // return response()->json($data);
            if (empty($data)) {
                return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
            } else
                return view('client.projects.myProjects')->with('data', $data);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Exception $th) {
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }
    // this function show the my cuurent work table
    function doneWork()
    {
        try {
            $data = Project::select(
                'posts.id as post_id',
                'posts.title',
                'posts.description',
                'projects.duration',
                'projects.id as project_id',
                'projects.seeker_id as seeker_id',
                'projects.stated_at',
                'projects.status',
                'projects.totalAmount as amount',
            )
                ->join('posts', 'posts.id', '=', 'projects.post_id')
                ->join('profiles', 'profiles.user_id', '=', 'projects.seeker_id')
                ->where('projects.provider_id', Auth::id())
                ->where('projects.finshed', 1)
                ->Where('projects.status', 'received')
                ->where('posts.is_active', 1)

                ->get();
            // return response()->json($data);
            if (empty($data)) {
                return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
            } else
                return view('client.projects.myProjects')->with('data', $data);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Exception $th) {
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }


    // this table send the project to the owner
    function markAsDone(Request $request)
    {
        try {
            $project_id = $request->project_id;
            $seeker_id = $request->seeker_id;
            // send notification 
            $project = Project::find($project_id);


            if ($request->other_option == 'on') {
                $project->other_way_send_files = 1;
            } else {
                if (!empty($request->upload) || !empty($request->url)) {
                    // !importemt to back here
                    // $project->files =  $this->uploadFile($request->file('upload'));
                    $project->url = $request->url;
                } else
                    return redirect()->back()->with(['message' => 'رجاء قم بارسال الملفات المطلوبه او اضغط على طريقه اخرى', 'type' => 'alert-danger']);
            }

            // return response()->json(empty($request->upload));
            $project->status = 'done';
            $project->save();

            $notify = new NotificationController();
            $notify->sendTheProjectNotifiction($project);

            // return response()->json($project);
            return back()->with(['message' => 'تم تسليم المشروع رجاء انتظر الطرف الاخر', 'type' => 'alert-success']);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }

    // this function for the seeker to see the received files
    function markAsRecive($project_id, $provider_id)
    {
        try {
            $project = Project::select(
                'posts.id as post_id',
                'posts.title',
                'posts.description as post_description',
                'projects.duration',
                'projects.id as project_id',
                'projects.seeker_id as seeker_id',
                'projects.provider_id as provider_id',
                'projects.stated_at',
                'projects.amount',
                'projects.other_way_send_files',
                'projects.url',
                'projects.files',
                'projects.payment_status',
                'projects.invoice',
                'comments.description as comment_description'
            )
                ->join('posts', 'posts.id', '=', 'projects.post_id')
                ->join('comments', 'comments.id', '=', 'projects.offer_id')
                ->join('profiles', 'profiles.user_id', '=', 'projects.provider_id')
                ->where('projects.seeker_id', Auth::id())
                ->where('projects.id', $project_id)
                ->where('projects.status', 'done')
                ->where('profiles.user_id', $provider_id)
                ->where('posts.is_active', 1)

                ->first();

            if ($project->payment_status == 'unpaid') {
                // ! need unpaid page 
                return back()->with(['message' => 'لم تقم بتسديد المبلغ المتفق عليه بعد  ', 'type' => 'alert-danger']);
            }
            if (empty($project)) {
                return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
            } else
                // return response()->json($project);
                return view('client.projects.receiveProject')->with('project', $project);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }


    // where the seeker accept the received file
    function markAsAccept(Request $request)
    {
        try {
            $project_id = $request->project_id;
            $provider_id = $request->provider_id;
            $project = Project::where('id', $project_id)
                ->where('seeker_id', Auth::id())
                ->where('provider_id', $provider_id)
                // ->where('status', 'done')
                ->first();

            PaymentController::sendTheMoneyBack('provider', $project_id);

            $project->status = 'received';
            $project->finshed = 1;
            $project->finshed_at =  date("Y/m/d");
            $project->save();

            // add the evaluation and reting
            $rating = new Evaluation();
            $rating->value = $request->rating;
            $rating->message = $request->massege;
            $rating->user_id = $provider_id;
            $rating->evaluater_id = Auth::id();
            $rating->project_id = $project_id;
            $rating->save();

            // edit user profile
            $profile = Profile::where('user_id', $provider_id)->first();
            $limitValue = $profile->limit;
            if ($limitValue <= 4 && $limitValue > 0) {
                $profile->limit =  $limitValue - 1;
            } else {
                $profile->limit = 4;
            }
            $profile->reseved =  $profile->reseved + 1;
            $profile->save();


            // notification

            $post = Posts::find($project->post_id);
            $post->status = 'closed';
            $post->save();

            $notify = new NotificationController();
            $notify->markAsReceveProjectNotification($project, $profile, $post);
            //! user profile limit - 1 
            //! user project done + 1 
            //! evaluate the user  
            //! notification of acceptence

            // return response()->json($profile);
            return redirect()->route('profile')->with(['message' => 'تم تسليم المشروعك بنجاح', 'type' => 'alert-success']);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            //     //throw $th;
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }

    // where the seeker reject the received file
    function markAsReject(Request $request)
    {
        try {
            $project_id = $request->project_id;
            $provider_id = $request->provider_id;
            // create report
            $report  = new Report();
            $report->massege = $request->massege;
            $report->user_id = Auth::id();
            $report->project_id = $project_id;
            $report->type_report = 'nonrecevied';

            $report->save();

            // update the project status
            $project = Project::where('id', $project_id)
                ->where('seeker_id', Auth::id())
                ->where('provider_id', $provider_id)
                ->where('status', 'done')
                ->first();

            $project->status = 'nonrecevied';
            // $project->finshed = 1;
            $project->save();
            $post = Posts::find($project->post_id);
            $profile = Profile::where('user_id', Auth::id())->first();

            //notification of rejection
            $notify = new NotificationController();
            $notify->markAsRejectNotifiction($project, $profile, $post);
            //! how to repeat the project to at_work

            return redirect()->route('profile')->with(['message' => 'لقد قمت برفض التسليم مشروعك', 'type' => 'alert-danger']);
            $project->status = 'reject_receive';
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->route('myProject')->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }

    // this function work when press into the continue project after rejection
    function markAsContinue($project_id)
    {
        try {
            $currentProject = Project::find($project_id);
            $currentProject->finshed = 1;


            $newProject = new Project();
            $newProject->provider_id = $currentProject->provider_id;
            $newProject->seeker_id = $currentProject->seeker_id;
            $newProject->post_id = $currentProject->post_id;
            $newProject->offer_id = $currentProject->offer_id;
            $newProject->amount = $currentProject->amount;
            $newProject->duration = $currentProject->duration;
            $newProject->stated_at = $currentProject->stated_at;
            $newProject->payment_status = 'paid';
            $newProject->status = 'at_work';
            $newProject->save();

            $currentProject->save();
            return back()->with(['message' => '   تم استأناف العمل على المشروع ', 'type' => 'alert-success']);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }

    // upload files
    public function uploadFile($file)
    {
        $dest = public_path() . "/images/";

        //$file = $request->file('image');
        $filename = time() . "_" . $file->getClientOriginalName();
        $file->move($dest, $filename);
        return $filename;
    }
}