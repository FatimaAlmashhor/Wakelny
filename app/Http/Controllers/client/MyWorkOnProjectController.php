<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
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
                'projects.amount',
            )
                ->join('posts', 'posts.id', '=', 'projects.post_id')
                ->join('profiles', 'profiles.user_id', '=', 'projects.seeker_id')
                ->where('projects.provider_id', Auth::id())
                ->where('projects.status', 'at_work')
                ->where('posts.is_active', 1)

                ->get();
            // return response()->json($data);
            if (empty($data)) {
                return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
            } else
                return view('client.projects.myProjects')->with('data', $data);
        } catch (\Exception $th) {
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }


    function markAsDone($project_id, $seeker_id)
    {

        try {
            // send notification 
            $project = Project::where('id', $project_id)
                ->where('provider_id', Auth::id())
                ->where('seeker_id', $seeker_id)
                ->where('status', 'at_work')
                ->first();

            $project->status = 'done';
            $project->save();

            $seeker = User::find($seeker_id);
            $post =  Posts::where('id', $project->post_id)->where('is_active', 1)->first();

            $data = [
                'project_id' => $project_id,
                'name' => auth()->user()->name,
                'project_title' => $post->title,
                // @prarm project id -> for get the data from
                // @prarm Auth id -> for get the provider data from
                'url' => url('confirm-receive/' . $project_id . '/' . Auth::id()),
                'message' => 'لقد قام' . Auth::user()->name . 'بتسليم  مشروعك ' . $post->title,
                'userId' => Auth::id()
            ];
            $seeker->notify(new MarkAsDoneNotification($data));
            // return response()->json($project);
            return back()->with(['message' => 'تم تسليم المشروع رجاء انتظر الطرف الاخر', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }

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

            if (empty($project)) {
                return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
            } else
                // return response()->json($project);
                return view('client.projects.receiveProject')->with('project', $project);
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
                ->where('status', 'done')
                ->first();

            print_r($request->rating);
            $project->status = 'received';
            $project->finshed = 1;
            $project->finshed_at =  date("Y/m/d");
            $project->save();

            // add the evaluation and reting
            $rating = new Evaluation();
            $rating->value = $request->rating;
            $rating->message = $request->massege;
            $rating->user_id = $provider_id;
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
            $providerNotify = User::find($provider_id);
            $post = Posts::find($project->post_id);
            $post->status = 'closed';
            $post->save();

            $data = [
                'project_id' => $project_id,
                'name' => $profile->name,
                'project_title' => $post->title,
                // @prarm project id -> for get the data from
                'url' => url('user-profile/' .  $provider_id),
                'message' => 'لقد قام' . $profile->name . ' بقبول  مشروعك المسلم ' . $post->title,
                'userId' => Auth::id()
            ];

            $providerNotify->notify(new MarkAsAcceptReceviceNotification($data));
            //! user profile limit - 1 
            //! user project done + 1 
            //! evaluate the user  
            //! notification of acceptence

            // return response()->json($profile);
            // return redirect()->route('profile')->with(['message' => 'تم تسليم المشروعك بنجاح', 'type' => 'alert-success']);
            return redirect()->back()->with(['message' => 'تم تسليم المشروعك بنجاح', 'type' => 'alert-success']);
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

            $project->satuse = 'nonrecevied';
            $project->save();
            $post = Posts::find($project->post_id);
            $profile = Profile::where('user_id', Auth::id());

            //notification of rejection
            $user = User::find($provider_id);

            $data = [
                'project_id' => $project_id,
                'name' => $profile->name,
                'project_title' => $post->title,
                // @prarm project id -> for get the data from
                'url' => url('user-profile/' .  $provider_id),
                'message' => 'لقد قام' . $profile->name . ' بقبول  مشروعك المسلم ' . $post->title,
                'userId' => Auth::id()
            ];
            $user->notify(new MarkAsRejectReceviceNotification($data));
            //! how to repeat the project to at_work

            return redirect()->route('profile')->with(['message' => 'لقد قمت برفض التسليم مشروعك', 'type' => 'alert-danger']);
            $project->status = 'reject_receive';
        } catch (\Throwable $th) {
            return back()->with(['message' => 'حدث خطأ ما او ان الصفحه اللتي تحاول الوصول لها غير موجوده', 'type' => 'alert-danger']);
        }
    }
}