<?php

namespace App\Http\Controllers;

use App\Events\CommentEvents;
use App\Models\User;
use App\Notifications\AcceptOfferNotification;
use App\Notifications\AcceptProjectNotification;
use App\Notifications\CommentNotification;
use App\Notifications\RejectProjectNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class NotificationController extends Controller
{

    function addcommentNotificatoin($post_id)
    {

        try {
            $postOwner = User::select(
                'posts.id',
                'posts.title',
                'users.id as userid',
                'users.name'
            )->join('posts', 'posts.user_id', '=', 'users.id')
                ->where('posts.id', $post_id)
                ->first();

            $user = User::find($postOwner->userid);
            $data = [
                'name' => $postOwner->name,
                'post_title' => $postOwner->title,
                'message' => 'قام ' .  $postOwner->name . ' باضافه تعليق على  مشروعك ' . $postOwner->title,
                'url' => url('posts/details/' . $postOwner->id),
                'userId' => $postOwner->userid
            ];



            $options = array(
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            );
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );


            $user->notify(new CommentNotification($data));
            $pusher->trigger('channel-name', 'App\\Events\\CommentEvents', $data);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('profile')->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
        }
    }

    
    function AcceptOffersNotification($projects)
    {
        $providerNotify = User::find($projects->provider_id);
        $data = [
            'project_id' => $projects->project_id,
            'name' => $projects->name,
            'project_title' => $projects->title,
            'url' => url('confirm-project/' . $projects->project_id . '/' . Auth::id()),
            'message' => 'لقد قام' . Auth::user()->name . 'بقبول عرضك لمشروع  ' . $projects->title,
            'userId' => $projects->provider_id
        ];
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );


        $providerNotify->notify(new AcceptOfferNotification($data));
        $pusher->trigger('channel-name', 'App\\Events\\CommentEvents', $data);
    }

    
    function acceptTheProjectNotifiction($project, $response)
    {
        $seekerNotify = User::find($project->seeker_id);
        $data = [
            'project_id' => $project->project_id,
            'name' => $seekerNotify->name,
            'project_title' => $project->title,
            'url' => url($response['invoice']['next_url']),
            'message' => 'لقد قام' . Auth::user()->name . 'بقبول مشروعك ' . $project->title,
            'userId' => $project->seeker_id
        ];
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );


        $seekerNotify->notify(new AcceptProjectNotification($data));
        $pusher->trigger('channel-name', 'App\\Events\\CommentEvents', $data);
    }


    function rejectProjectNotifiction($project)
    {

        $providerNotify = User::find($project->seeker_id);
        $data = [
            'project_id' => $project->project_id,
            'name' => $providerNotify->name,
            'project_title' => $project->title,
            'url' => url('confirm-project/' . $project->project_id . '/' . $project->seeker_id),
            'message' => 'لقد قام' . Auth::user()->name . 'برفض مشروعك ' . $project->title,
            'userId' => $project->seeker_id
        ];
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $providerNotify->notify(new RejectProjectNotification($data));
        $pusher->trigger('channel-name', 'App\\Events\\CommentEvents', $data);
    }

    function sendTheProjectNotifiction(){

    }

    function markAsReceveProjectNotification(){
        
    }

    function markAsRejectNotifiction(){
        
    }
}