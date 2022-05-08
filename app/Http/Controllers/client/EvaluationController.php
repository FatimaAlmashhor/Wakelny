<?php

namespace App\Http\Controllers\client;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluationController extends Controller
{
    //
    public function store(Request $request){
        try {
            $evaluate = new Evaluation();
            $evaluate->project_id = $request->project_id;
            $evaluate->user_id = $request->provider_id;
            $evaluate->value = $request->rating;
            $evaluate->message = $request->massege;
            $evaluate->seeker_id = Auth::id();

            $report->save();

        } catch (Expectation   $th){
            return back()->with(['message' => 'فشلت عملية التقييم لأسباب فنية! كرر المحاولة', 'type' => 'alert-danger']);
        }
    }

    public function showAll(){
        $evaluates = Evaluation::select(
            'evaluations.id',
            'evaluations.project_id',
            'evaluations.user_id',
            'evaluations.value',
            'evaluations.message',
            'evaluations.seeker_id',
            'posts.title', 
            'evaluaters.name as evaluater',
            'evaluateds.name as evaluated',
        )->join('projects', 'projects.id', '=', 'evaluations.project_id')
        ->join('posts', 'posts.id', '=', 'projects.post_id')
        ->join('profiles as evaluaters', 'evaluaters.user_id', '=', 'evaluations.seeker_id')
        ->join('profiles as evaluateds', 'evaluateds.user_id', '=', 'evaluations.user_id')
        ->groupBy('user_id')
        ->get();

        print_r($evaluates);

        // return view('client.userProfile.userProfile')->with(['evaluates'=>$evaluates]); 
    }
}
