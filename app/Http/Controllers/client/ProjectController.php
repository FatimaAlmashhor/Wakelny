<?php

namespace App\Http\Controllers\client;

use App\Models\Posts;
use App\Models\Project;
use App\Models\Comments;
use Mockery\Expectation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AcceptOfferNotification;
use App\Notifications\AcceptProjectNotification;
use App\Notifications\RejectProjectNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ProjectController extends Controller
{
    //
    function acceptOffer(Request $request)
    {
        // try {
        $request->validate(
            [
                'amount' => ['required']
            ],
            [
                'amount.required' => 'المبلغ المتفق عليه مطلوب *',
            ]
        );

        $amount = $request->amount;

        $project = new Project();
        $project->seeker_id = Auth::id();
        $project->provider_id = $request->provider_id;
        $project->offer_id = $request->offer_id;
        $project->status = 'pending';
        $project->amount = $amount;

        // print_r($amount);

        if ($project->save()) {
            // return redirect()->route('provider-confirmation')->with(['amount' => $amount]);

            return $this->showProviderConfirmation($amount, $request->provider_id, $request->offer_id, $project->id);
        }
        // } catch (Expectation $th) {
        //     return back()->with(['message' => 'فشلت عملية قبول الطلب!! أعد المحاولة', 'type' => 'alert-danger']);
        // }
    }

    function showProviderConfirmation($amount = null, $provider_id, $comment_id, $project_id)
    {

        // try {
        $projects = Project::select(
            'comments.id',
            'comments.duration',
            'comments.cost',
            'comments.description as comment_description',
            'posts.title',
            'profiles.name',
            'posts.description as post_description',
            'projects.offer_id',
            'projects.id as project_id'
        )
            ->join('comments', 'comments.id', '=', 'projects.offer_id')
            ->join('posts', 'posts.user_id', '=', 'projects.seeker_id')
            ->join('profiles', 'profiles.user_id', '=', 'projects.seeker_id')
            ->where('comments.is_active', 1)
            ->where('comments.user_id', $provider_id)
            ->where('comments.id', $comment_id)
            ->where('posts.user_id', Auth::id())
            ->where('projects.id', $project_id)
            ->first();

        // notify the provider about the acceptence of the offer
        $providerNotify = User::find($provider_id);
        $data = [
            'project_id' => $projects->project_id,
            'name' => $projects->name,
            'project_title' => $projects->title,
            'url' => url('confirm-project/' . $projects->project_id . '/' . Auth::id()),
            'message' => 'لقد قام' . Auth::user()->name . 'بقبول عرضك ' . $projects->title,
            'userId' => Auth::id()
        ];
        $providerNotify->notify(new AcceptOfferNotification($data));


        return redirect()->back()->with(['message' => 'لقد تم ارسال رسال قبول للعرض رجاء انتظر رد الطرف الاخر', 'type' => 'alert-success']);
        // return view('client.post.providerConfirmation')->with(['project' => $projects, 'amount' => $amount]);
        // return redirect()->route('provider-confirm')->with('projects', $projects);
        // } catch (\Exception $th) {
        //     //throw $th;
        //     return redirect()->back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        // }
    }


    // here the project show details to the provider
    function confirmProject($project_id, $seeker_id)
    {
        try {
            $projects = Project::select(
                'comments.id',
                'comments.duration',
                'comments.cost',
                'comments.description as comment_description',
                'posts.title',
                'posts.description as post_description',
                'projects.offer_id',
                'projects.amount',
                'projects.seeker_id',
                'projects.status',
                'projects.id as project_id',
            )
                ->join('comments', 'comments.id', '=', 'projects.offer_id')
                ->join('posts', 'posts.user_id', '=', 'projects.seeker_id')
                ->where('posts.user_id', $seeker_id)
                ->where('projects.id', $project_id)
                ->where('projects.provider_id', Auth::id())
                ->first();

            // print_r($projects);
            if ($projects->status == 'pending')
                return view('client.post.providerConfirmation')->with(['project' => $projects, 'amount' => $projects->amount]);
            else
                return redirect()->back()->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
        } catch (\Exception $th) {
            //throw $th;
        }
    }

    // if ther use accept the project
    function acceptProject($project_id, $seeker_id)
    {
        // notify the provider about the acceptence of the offer
        $providerNotify = User::find($seeker_id);

        $project = Project::select(
            'posts.title'
        )->join('posts', 'posts.user_id', 'projects.seeker_id')
            ->where('projects.seeker_id', $seeker_id)
            ->where('projects.id', $project_id)
            ->first();
        $data = [
            'project_id' => $project_id,
            'name' => $providerNotify->name,
            'project_title' => $project->title,
            'url' => url('confirm-project/' . $project_id . '/' . $seeker_id),
            'message' => 'لقد قام' . Auth::user()->name . 'بقبول مشروعك ' . $project->title,
            'userId' => Auth::id()
        ];

        Project::where('id', $project_id)->update([
            'status' => 'at_work',
        ]);
        $providerNotify->notify(new AcceptProjectNotification($data));
        return redirect()->route('profile')->with(['message' => 'لقد تم ارسال رساله القبول الطرف الاخر', 'type' => 'alert-success']);
    }

    // if the provider reject the project
    function rejectProject($project_id, $seeker_id)
    {
        // notify the provider about the acceptence of the offer
        $providerNotify = User::find($seeker_id);

        $project = Project::select(
            'posts.title'
        )->join('posts', 'posts.user_id', 'projects.seeker_id')
            ->where('projects.seeker_id', $seeker_id)
            ->where('projects.id', $project_id)
            ->first();
        $data = [
            'project_id' => $project_id,
            'name' => $providerNotify->name,
            'project_title' => $project->title,
            'url' => url('confirm-project/' . $project_id . '/' . $seeker_id),
            'message' => 'لقد قام' . Auth::user()->name . 'برفض مشروعك ' . $project->title,
            'userId' => Auth::id()
        ];

        Project::where('id', $project_id)->update([
            'status' => 'rejected',
        ]);
        $providerNotify->notify(new RejectProjectNotification($data));
        return redirect()->route('profile')->with(['message' => 'لقد تم ارسال رساله الرفض الطرف الاخر', 'type' => 'alert-success']);
    }

    function providerResponse(Request $request)
    {
        if ($request->input('confirm')) {
            $project = Project::where('offer_id', $request->offer_id)->update(['status' => 'at work']);
        } elseif ($request->input('reject')) {
            $project = Project::where('offer_id', $request->offer_id)->update(['status' => 'rejected']);
        }

        return redirect()->back();
    }
}