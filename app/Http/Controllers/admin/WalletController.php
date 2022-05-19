<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Models\Transfer;
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

        // $transactions = DB::table('transactions')->join('projects', 'projects.id', function ($q) {
        // return $q->whereJsonContains('meta', ['project_id']);
        // })->get();
        // $transactions = Transaction::select(
        //     "meta->'$.project_id'"
        //     // 'projects.post_id',
        //     // 'posts.title',
        //     // 'transactions.amount',
        //     // 'transactions.created_at'
        // )
        //     ->join('projects', 'projects.id', '=', 'JSON_CONTAINS(meta, \'{"project_id"}\')')
        //     // ->where("meta->'project_id'", '!=', null)
        //     //     ->where('payable_id', 1)
        //     //     // ->whereJsonContains('meta', 'project_id')
        //     //     // where('type', 'deposit')
        //     //     // ->whereJsonContains('meta', ['project_id' => 'project_id'])
        //     //     // ->join('posts', 'posts.id', '=', 'projects.post_id')
        //     ->get();
        $transactions = Transfer::select(
            'profiles.name',
            'deposit.amount',
            'deposit.meta->project_id',
            'withdraw.amount',
            'transfers.created_at',
            'posts.title',
        )
            ->join('profiles', 'profiles.user_id', '=', 'from_id')
            ->join('transactions as deposit', 'deposit.id', '=', 'transfers.deposit_id')
            ->join('transactions as withdraw', 'withdraw.id', '=', 'transfers.withdraw_id')
            ->join('projects', 'projects.id', '=', 'deposit.meta->project_id')
            ->join('posts', 'posts.id', '=', 'projects.post_id')
            ->where('to_id', 1)
            ->get();
        // $resulte = json_decode($transactions);
        return view('admin.wallet.wallet', ['balance' => $balance, 'fee' => $projectsFee->fee, 'transaction' => $transactions]);
    }
}