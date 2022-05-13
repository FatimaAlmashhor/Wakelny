<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{


    function doPayment($project_id, $seeker_id)
    {
        $project = Project::select(
            'posts.title',
            'projects.amount',
            'projects.totalAmount',
            'projects.seeker_id',
            'projects.provider_id',
        )->join('posts', 'posts.id', 'projects.post_id')
            ->where('projects.seeker_id', $seeker_id)
            ->where('projects.id', $project_id)
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
            'total_amount' => 199,
            'currency' => 'YER',
            'success_url' => 'http://localhost:8000/success-payment',
            'cancel_url' => 'http://localhost:8000//cancel-payment',
            'metadata' => (object)$dataMeta
        ]);

        return $response->json($key = null);
    }
    public static function successPayment($project_id,  $response)
    {
        try {
            $project = Project::select(
                'posts.title',
                'projects.amount',
                'projects.totalAmount',
                'projects.seeker_id',
                'projects.provider_id',
                'projects.invoice',
                'projects.payment_status',
            )->join('posts', 'posts.id', 'projects.post_id')
                ->where('projects.id', $project_id)
                ->first();

            // add the moeny into the admin wallet
            // set the information into the meta 


            if ($project->payment_status == 'unpaid') {
                $admin = User::find(1);
                $seeker = User::find(Auth::id());
                $seeker->transfer($admin, $project->amount, [
                    // 'provider_id' => $project->provider_id,
                    // 'seeker_id' => $payment['meta_data']['seeker_id'],
                    'project_id' => $project_id,
                    'invoice_referance' => $project->invoice,
                    // 'back_to_owner' => false,
                    // 'admin_resevied' => true
                ]);


                Project::where('id', $project_id)->update([
                    'payment_status' => 'paid'
                ]);
                return view('client.payAnimation.paySucces');
            } else {

                // ! here should show the 413 error
                return view('client.payAnimation.payUnsucces');
            }

            $filterdRes = base64_decode($response);
            return response()->json(json_decode($filterdRes, true));

            // send notification for the seeker that the money is already خصمت 
            // return redirect()->route('profile')->with(['message' => 'لقد تم سداد المبلغ بنجاح', 'type' => 'alert-success']);
            // open the frontend page 
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('profile')->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
        }
    }

    // if the payment is cancled 
    function cancelPayment()

    {
        // return redirect()->route('profile')->with(['message' => 'لقد قمت بألغاء عمليه الدفع رجاء تأكد من دفع المبلغ المحدد ', 'type' => 'alert-danger']);
        return view('client.payAnimation.payUnsucces');
    }


    static function sendTheMoneyToProvider($project_id/*$invoice_referance*/)
    {

        try {
            // find the row of the wallet 
            $project = Project::where('id', $project_id)->first();
            if ($project->payment_status == 'paid') {
                $userTheOneNeedMoney = User::find($project->provider_id);
                $admin = User::find(1);
                $admin->transfer($userTheOneNeedMoney, $project->totalAmount); //here with the patform withdraw 

                $project->payment_status = 'received';
                $project->save();
            } else {
                return redirect()->route('profile')->with(['message' => 'حدث خطأ ما ', 'type' => 'alert-warning']);
            }
            // ? here when we use the transaction 
            // $transaction = Transaction::whereJsonContains('meta', ['provider_id' => (int)$provider_id])
            //     ->whereJsonContains('meta', ['project_id' => (int)$project_id])
            //     ->whereJsonContains('meta', ['project_id' => (int)$project_id])
            //     // ->whereJsonContains('meta', ['invoice_referance' => (int)$invoice_referance])
            //     ->whereJsonContains('meta', ['back_to_owner' => false])
            //     ->first();
            // $transaction = Transaction::whereRaw("JSON_EXTRACT(`meta`, '\$[provider_id]') = 11")->get();

            // get the user id 
            // withdraw the money from the provider to admin
            // send the money to the provider 

            // send the message back to the brovider

        } catch (\Throwable $th) {
            return redirect()->route('profile')->with(['message' => 'انت لمن تعد مصرح له بالدخول لهذه الصفحه ', 'type' => 'alert-danger']);
        }
    }

    function sendTheMoneyToSeeker($seeker_id, $project_id/*$invoice_referance*/)
    {


        // find the row of the wallet 
        $transaction = Transaction::whereJsonContains('meta', ['seeker_id' => (int)$seeker_id])
            ->whereJsonContains('meta', ['project_id' => (int)$project_id])
            ->whereJsonContains('meta', ['project_id' => (int)$project_id])
            // ->whereJsonContains('meta', ['invoice_referance' => (int)$invoice_referance])
            ->whereJsonContains('meta', ['back_to_owner' => false])
            ->first();
        // $transaction = Transaction::whereRaw("JSON_EXTRACT(`meta`, '\$[provider_id]') = 11")->get();

        // get the user id 
        // withdraw the money from the provider to admin
        // send the money to the provider 
        $userTheOneNeedMoney = User::find($transaction->meta['seeker_id']);
        $admin = User::find(1);
        // back to all total 
        $admin->transfer($userTheOneNeedMoney, 45);
        // send the message back to the brovider

        return response()->json($transaction->meta['seeker_id']);
    }
}