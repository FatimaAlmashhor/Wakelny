<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Models\Transfer;
use Bavix\Wallet\Models\Wallet as ModelsWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    //
    function index()
    {
        $admin = User::find(1);
        $balance  = $admin->balance;
        $projectsFee = Project::selectRaw('sum(amount - totalAmount) as fee')
            ->where('finshed', 1)
            ->where('payment_status', 'received')
            ->first();
        $wallet_id = ModelsWallet::where('holder_id', 1)->first();

        $transactions_to_owner = Transfer::select(
            'from.name',
            'deposit.amount as dep_amount',
            'deposit.meta->project_id',
            'withdraw.meta->project_id',
            'withdraw.amount as with_amount',
            'transfers.created_at',
            'dep_post.title',
            'with_post.title',
        )
            // ->join('wallets as  wa1', 'wa1.id', '=', 'to_id')
            ->join('wallets as wa2', 'wa2.id', '=', 'from_id')
            ->join('profiles as from', 'from.user_id', '=', 'wa2.holder_id')
            // ->join('profiles as to', 'to.user_id', '=', 'wa2.holder_id')
            ->join('transactions as deposit', 'deposit.id', '=', 'transfers.deposit_id')
            ->join('transactions as withdraw', 'withdraw.id', '=', 'transfers.withdraw_id')
            ->join('projects as dep', 'dep.id', '=', 'deposit.meta->project_id')
            ->join('projects as with', 'with.id', '=', 'withdraw.meta->project_id')
            ->join('posts as dep_post', 'dep_post.id', '=', 'dep.post_id')
            ->join('posts as with_post', 'with_post.id', '=', 'with.post_id')
            // ->where($iAmSeeker ? 'from_id' : 'to_id', $wallet->id)
            ->where('to_id', $wallet_id->id)
            // ->orWhere('from_id', $wallet->id)
            ->get();
        $transactions_from_owner = Transfer::select(
            'to.name',
            'withdraw.meta->project_id',
            'withdraw.amount as with_amount',
            'transfers.created_at',
            'with_post.title',
        )
            ->join('wallets as  wa1', 'wa1.id', '=', 'to_id')
            // ->join('wallets as wa2', 'wa2.id', '=', 'from_id')
            // ->join('profiles as from', 'from.user_id', '=', 'wa2.holder_id')
            ->join('profiles as to', 'to.user_id', '=', 'wa1.holder_id')
            ->join('transactions as deposit', 'deposit.id', '=', 'transfers.deposit_id')
            ->join('transactions as withdraw', 'withdraw.id', '=', 'transfers.withdraw_id')
            ->join('projects as dep', 'dep.id', '=', 'deposit.meta->project_id')
            ->join('projects as with', 'with.id', '=', 'withdraw.meta->project_id')
            ->join('posts as dep_post', 'dep_post.id', '=', 'dep.post_id')
            ->join('posts as with_post', 'with_post.id', '=', 'with.post_id')
            // ->where($iAmSeeker ? 'from_id' : 'to_id', $wallet->id)
            // ->where('to_id', $wallet->id)
            ->where('from_id', $wallet_id->id)
            ->get();
        // return response()->json($transactions);
        return view('admin.wallet.wallet', [
            'balance' => $balance, 'fee' => $projectsFee->fee,    'deposit' => $transactions_to_owner,
            'withdraw' => $transactions_from_owner
        ]);
    }
}