<?php

namespace App\Http\Controllers\client;

use App\Models\Posts;
use App\Models\Project;
use App\Models\Comments;
use Mockery\Expectation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

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

            $project = new Project();
            $project->seeker_id = Auth::id();
            $project->provider_id = $request->provider_id;
            $project->offer_id = $request->offer_id;
            $project->status = 'pending';

            $amount = $request->amount;
            // print_r($amount);

            if ($project->save()){
                // return redirect()->route('provider-confirmation')->with(['amount' => $amount]);
                return $this->showProviderConfirmation($amount);
            }

        } catch (Expectation $th) {
            return back()->with(['message' => 'فشلت عملية قبول الطلب!! أعد المحاولة', 'type' => 'alert-danger']);
        }
    }

    function showProviderConfirmation($amount=null){

        $projects = Comments::select(
            'comments.id',
            'comments.duration', 
            'comments.cost', 
            'comments.description as comment_description', 
            'posts.title',
            'posts.description as post_description'
        )->join('posts', 'posts.id', '=', 'comments.post_id')->where('comments.is_active', 1)->get();

        return view('client.post.providerConfirmation')->with(['projects' => $projects, 'amount' => $amount]);
        // return redirect()->route('provider-confirm')->with('projects', $projects);
    }

    function providerResponse(Request $request){
        if ($request->input('confirm')){
            $project = Project::where('offer_id', $request->offer_id)->update(['status' => 'at work']);
        }
        elseif ($request->input('reject')) {
            $project = Project::where('offer_id', $request->offer_id)->update(['status' => 'rejected']);
        }

        return redirect()->back();
    }
}