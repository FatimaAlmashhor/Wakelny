<?php

namespace App\Http\Controllers\client;

use App\Events\Comment;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class CommentsController extends Controller
{
    //

    public function save(Request $request)
    {
        // try {
        $request->validate([
            'cost' => ['required', 'numeric'],
            'duration' => ['required', 'numeric'],
        ], [
            'cost.required' => 'رجاء قم بأدخال التكلفه لهذا المشروع',
            'duration.required' => 'حقل المده مطلوب',
            'duration.numeric' => 'يجب ان يكون حق المده من نوع رقمي',
        ]);

        $comment = new Comments();
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->cost = $request->cost;
        $comment->duration = $request->duration;
        $comment->description = $request->message;
        $comment->is_active = 1;
        $comment->cost_after_taxs = $request->cost / 0.5;

        if ($comment->save()) {
            // event(new Comment('fatima'));
            // Comment::dispatch('fatima');
            broadcast(new Comment('fatima'))->toOthers();
            $postOwner = Posts::select(
                'posts.title',
                'users.name',
                'users.id as userId',
                'posts.id'
            )->join('users', 'users.id', '=', 'posts.user_id')->where('posts.id', $request->post_id)->first();
            $user = User::find($postOwner->userId);
            $data = array(
                'name' => $postOwner->name,
                'userid' => $postOwner->userId,
                'postid' => $postOwner->id,
                'post_title' => $postOwner->title,
                'url' => '//post//details//' . $postOwner->id
            );

            $user->notify(new CommentNotification($data));
            print_r($data);
            return redirect()->back()
                ->with(['message' => 'تم اضافة عرضك  بنجاح', 'type' => 'alert-success']);
        } else {
            return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        }
        // } catch (\Throwable $th) {
        //throw $th;
        // return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        // }
    }
}