<?php

namespace App\Http\Controllers\client;

use Mockery\Expectation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    //
    function notifyProvider(Request $request){
        try {
            $request->validate ([
                'amount' => ['required']
            ],
            [
                'amount.required' => 'المبلغ المتفق عليه مطلوب *',
            ]);

            // return redirect()->route('provider-confirmation')->with($request->amount);
            return redirect()->route('provider-confirmation');

        } catch (Expectation $th) {
            return back()->with(['message' => 'فشلت عملية قبول الطلب!! أعد المحاولة', 'type' => 'alert-danger']);
        }
    }

    function providerConfirmation(){
        return view('client.post.providerConfirmation');
    }
}
