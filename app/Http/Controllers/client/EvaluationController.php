<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

            $report->save();
            
        } catch (Expectation   $th){
            return back()->with(['message' => 'فشلت عملية التقييم لأسباب فنية! كرر المحاولة', 'type' => 'alert-danger']);
        }
    }
}
