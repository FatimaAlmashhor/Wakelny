<?php

namespace App\Http\Controllers\client;

use App\Models\Posts;
use App\Models\Project;
use App\Models\Comments;
use Mockery\Expectation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    //
    function acceptOffer(Request $request){
        try {
            $request->validate ([
                'amount' => ['required']
            ],
            [
                'amount.required' => 'المبلغ المتفق عليه مطلوب *',
            ]);
            
            return redirect()->route('provider-confirmation');

        } catch (Expectation $th) {
            return back()->with(['message' => 'فشلت عملية قبول الطلب!! أعد المحاولة', 'type' => 'alert-danger']);
        }
    }

    function providerConfirmation(){

        $project = Comments::select(
            'comments.duration', 
            'comments.cost', 
            'comments.description as comment_description', 
            'posts.title',
            'posts.description as post_description'
        )->join('posts', 'posts.id', '=', 'comments.post_id')->where('comments.is_active', 1)->get();

        return view('client.post.providerConfirmation')->with('projects', $project);
    }
}