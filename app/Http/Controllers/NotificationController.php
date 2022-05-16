<?php

namespace App\Http\Controllers;

use App\Events\CommentEvents;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class NotificationController extends Controller
{

    function addcommentNotificatoin($post_id)
    {

        print_r('I am iside the notifiaction');
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
            'url' => url('posts/details/' . $postOwner->id),
            'userId' => $postOwner->userid
        ];

        // $user->notify(new CommentNotification($data));
        // event(new CommentEvents($data));

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


        $pusher->trigger('channel-name', 'App\\Events\\CommentEvents', $data);
    }
}