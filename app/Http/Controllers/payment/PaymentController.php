<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public static function successPayment()
    {
        try {

            $payment = [
                'invoice_referance' => 2,
                'total_amount' => 1500,
                'products' => [
                    [
                        'id' => 1
                    ],

                ],
                'meta_data' => [
                    'provider_id' => 11,
                    'seeker_id' => 10
                ]
            ];
            // add the moeny into the admin wallet
            // set the information into the meta 
            $admin = User::find(1);
            $admin->deposit($payment['total_amount'], [
                'provider_id' => $payment['meta_data']['provider_id'],
                'seeker_id' => $payment['meta_data']['seeker_id'],
                'project_id' => $payment['products'][0]['id'],
                'invoice_referance' => $payment['invoice_referance'],
                'back_to_owner' => false,
                'admin_resevied' => true
            ]);
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
        return redirect()->route('profile')->with(['message' => 'لقد قمت بألغاء عمليه الدفع رجاء تأكد من دفع المبلغ المحدد ', 'type' => 'alert-danger']);
    }


    function sendTheMoneyToProvider($provider_id, $project_id/*$invoice_referance*/)
    {


        // find the row of the wallet 
        $transaction = Transaction::whereJsonContains('meta', ['provider_id' => (int)$provider_id])
            ->whereJsonContains('meta', ['project_id' => (int)$project_id])
            ->whereJsonContains('meta', ['project_id' => (int)$project_id])
            // ->whereJsonContains('meta', ['invoice_referance' => (int)$invoice_referance])
            ->whereJsonContains('meta', ['back_to_owner' => false])
            ->first();
        // $transaction = Transaction::whereRaw("JSON_EXTRACT(`meta`, '\$[provider_id]') = 11")->get();

        // get the user id 
        // withdraw the money from the provider to admin
        // send the money to the provider 
        $userTheOneNeedMoney = User::find($transaction->meta['provider_id']);
        $admin = User::find(1);
        $admin->transfer($userTheOneNeedMoney, 45);
        // send the message back to the brovider

        return response()->json($transaction->meta['provider_id']);
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