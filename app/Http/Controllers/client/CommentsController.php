<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //

    public function save(Request $request)
    {
        try {
            $request->validate([
                'cost' => ['required', 'numeric', 'max:1000000'],
                'duration' => ['required', 'numeric', 'max:1000000'],
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

            $comments  = Comments::where('post_id', $request->post_id)->count();

            // update the offer numbers
            Posts::where('id', $request->post_id)->update([
                'offers' => $comments + 1
            ]);
            if ($comment->save()) {

                // send to the seeker about the new notification
                $postOwner = User::select(
                    'posts.id',
                    'posts.title',
                    'users.id as userid',
                    'users.name'
                )->join('posts', 'posts.user_id', '=', 'users.id')
                    ->where('posts.id', $request->post_id)
                    ->first();

                $user = User::find($postOwner->userid);
                $data = [
                    'name' => $postOwner->name,
                    'post_title' => $postOwner->title,
                    'url' => url('posts/details/' . $postOwner->id),
                    'userId' => Auth::id()
                ];
                $user->notify(new CommentNotification($data));


                return redirect()->back()
                    ->with(['message' => 'تم اضافة عرضك  بنجاح', 'type' => 'alert-success']);
            } else {
                return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
            }
        } catch (\Throwable $th) {
            throw $th;
            return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        }
    }
     // update comment

    public function update(Request $request, $comment_id)
    {

        $request->validate([

            'cost' => ['required', 'numeric'],
            'duration' => ['required', 'numeric'],
            'message' => ['required'],
        ], [
            'cost.required' => 'رجاء قم بأدخال التكلفه لهذا العرض',
            'duration.required' => 'حقل المده مطلوب',
            'duration.numeric' => 'يجب ان يكون حق المده من نوع رقمي',
            'message.required' => 'اضف تفاصيل للعرض ',
            // 'message.min' => 'حقل الوصف يجب ان يحتوي على 255 حرف على الاقل',
        ]);

        $comment = Comments::find($comment_id);
        // $comment->user_id = Auth::id();

        //   $comment->user_id = Auth::id();
        // $comment->post_id = $request->post_id;
        $comment->cost = $request->cost;
        $comment->duration = $request->duration;
        $comment->description = $request->message;
        $comment->is_active = 1;
        $comment->cost_after_taxs = $request->cost / 0.5;


        if ($comment->save()) {
            return redirect()->back()
                ->with(['message' => 'تم تعديل المشروع بنجاح', 'type' => 'alert-success']);
        } else
            return back()->with(['message' => 'فشلت عمليه التعديل الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
    }
}
