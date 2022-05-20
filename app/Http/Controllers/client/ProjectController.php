<?php

namespace App\Http\Controllers\client;

use App\Models\Posts;
use App\Models\Project;
use App\Models\Comments;
use Mockery\Expectation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\payment\PaymentController;
use App\Models\Profile;
use App\Models\User;
use App\Notifications\AcceptOfferNotification;
use App\Notifications\AcceptProjectNotification;
use App\Notifications\RejectProjectNotification;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class ProjectController extends Controller
{
    //

    // this function to seeker to create the project aggregation /acceptance
    function acceptOffer(Request $request)
    {
        try {
            $request->validate(
                [
                    'amount' => ['required']
                ],
                [
                    'amount.required' => 'المبلغ المتفق عليه مطلوب *',
                ]
            );

            $amount = $request->amount;
            $duration = $request->duration;

            $project = new Project();
            $project->seeker_id = Auth::id();
            $project->provider_id = $request->provider_id;
            $project->offer_id = $request->offer_id;
            $project->status = 'pending';
            $project->amount = $amount;

            // after the patform discount
            $project->totalAmount =  $project->amount - $project->amount * 0.05;
            $project->duration = $duration;
            $project->post_id = $request->post_id;

            // print_r($amount);

            if ($project->save()) {
                // return redirect()->route('provider-confirmation')->with(['amount' => $amount]);

                return $this->showProviderConfirmation($request->provider_id, $request->offer_id, $project->id, $request->post_id);
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (Expectation $th) {
            return back()->with(['message' => 'فشلت عملية قبول الطلب!! أعد المحاولة', 'type' => 'alert-danger']);
        }
    }

    function showProviderConfirmation($provider_id, $comment_id, $project_id, $post_id)
    {

        try {
            $projects = Project::select(
                'comments.id',
                'comments.duration',
                'comments.cost',
                'comments.description as comment_description',
                'posts.title',
                'profiles.name',
                'posts.description as post_description',
                'projects.offer_id',
                'projects.provider_id',
                'projects.id as project_id'
            )
                ->join('comments', 'comments.id', '=', 'projects.offer_id')
                ->join('posts', 'posts.id', '=', 'projects.post_id')
                ->join('profiles', 'profiles.user_id', '=', 'projects.seeker_id')
                ->where('comments.is_active', 1)
                ->where('comments.user_id', $provider_id)
                ->where('comments.id', $comment_id)
                ->where('posts.id', $post_id)
                ->where('projects.id', $project_id)
                ->first();

            // notify the provider about the acceptence of the offer
            $notify = new NotificationController();
            $notify->AcceptOffersNotification($projects);

            // return response()->json($projects->title);
            return redirect()->back()->with(['message' => 'لقد تم ارسال رسال قبول للعرض رجاء انتظر رد الطرف الاخر', 'type' => 'alert-success']);
            // return view('client.post.providerConfirmation')->with(['project' => $projects, 'amount' => $amount]);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Exception $th) {
            //     //throw $th;
            return redirect()->back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        }
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
                'projects.duration',
                'projects.seeker_id',
                'projects.status',
                'projects.id as project_id',
            )
                ->join('comments', 'comments.id', '=', 'projects.offer_id')
                ->join('posts', 'posts.id', '=', 'projects.post_id')
                ->where('posts.user_id', $seeker_id)
                ->where('projects.id', $project_id)
                ->where('projects.provider_id', Auth::id())
                ->first();

            // print_r($projects);
            // if ($projects->status == 'pending')
            return view('client.post.providerConfirmation')->with(['project' => $projects, 'amount' => $projects->amount]);
            // else {
            //     return redirect()->route('profile')->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
            // }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Exception $th) {
            //throw $th;
            return redirect()->route('profile')->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
        }
    }

    // if ther use accept the project
    function acceptProject($project_id, $seeker_id)
    {
        try {
            // notify the provider about the acceptence of the offer


            $project = Project::select(
                'posts.title',
                'projects.amount',
                'projects.totalAmount',
                'projects.seeker_id',
                'projects.provider_id',
                'projects.status',
                'projects.payment_status',
            )->join('posts', 'posts.id', 'projects.post_id')
                ->where('projects.seeker_id', $seeker_id)
                ->where('projects.id', $project_id)
                ->where('projects.payment_status', 'unpaid')
                ->where('projects.status', 'pending')
                ->first();


            $dataPayment = [
                "id" => $project_id,
                "product_name" => $project->title,
                "quantity" => 1,
                "unit_amount" => $project->amount
            ];

            $dataMeta = [
                "provider_id" => $project->provider_id,
                "seeker_id" => $seeker_id
            ];

            $response = Http::withHeaders([
                'private-key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',
                'public-key' => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',
                'Content-Type' => 'application/x-www-form-url'
            ])->post('https://waslpayment.com/api/test/merchant/payment_order', [
                'order_reference' =>  $project_id,
                'products' =>  [$dataPayment],
                // 'total_amount' => $project->totalAmount,
                'total_amount' => $project->totalAmount,
                'currency' => 'YER',
                'success_url' => 'http://localhost:8000/ar/success-payment/' . $project_id,
                'cancel_url' => 'http://localhost:8000/ar/cancel-payment/' .  $project_id,
                'metadata' => (object)$dataMeta
            ]);



            $notify = new NotificationController();
            $notify->acceptTheProjectNotifiction($project, $response);

            Project::where('id', $project_id)->update([
                'status' => 'at_work',
                'stated_at' => date("Y/m/d"),
                'invoice' => $response['invoice']['invoice_referance']
            ]);

            Profile::where('user_id', Auth::id())
                ->where('limit', '<=', 4)
                ->where('limit', '>=', 0)
                ->decrement('limit');



            // return response()->json($seekerNotify);
            return redirect()->route('profile')->with(['message' => 'لقد تم ارسال رساله القبول الطرف الاخر', 'type' => 'alert-success']);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            return redirect()->route('profile')->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
        }
    }

    // if the provider reject the project
    function rejectProject($project_id, $seeker_id)
    {
        try {
            // notify the provider about the acceptence of the offer


            $project = Project::select(
                'posts.title',
                'projects.seeker_id',
                'projects.id as project_id'
            )->join('posts', 'posts.id', 'projects.post_id')
                ->where('projects.seeker_id', $seeker_id)
                ->where('projects.id', $project_id)
                ->first();

            $saveProj = Project::find($project_id);
            $saveProj->status = 'rejected';
            $saveProj->save();


            $notify = new NotificationController();
            $notify->rejectProjectNotifiction($project);

            return redirect()->route('profile')->with(['message' => 'لقد تم ارسال رساله الرفض الطرف الاخر', 'type' => 'alert-success']);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (\Throwable $th) {
            return redirect()->route('profile')->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
        }
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