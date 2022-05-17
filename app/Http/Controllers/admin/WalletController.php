<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;

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
        $transactions = Transaction::
            // select('projects.post_id', 'posts.title', 'transactions.amount', 'transactions.created_at')
            where('payable_id', 1)
            // where('type', 'deposit')
            // ->join('projects', 'projects.id', '=', 'transactions.meta')
            // ->whereJsonContains('meta', ['project_id' => 'project_id'])
            // ->join('posts', 'posts.id', '=', 'projects.post_id')
            ->get();
        // return response()->json($transactions);
        return view('admin.wallet.wallet', ['balance' => $balance, 'fee' => $projectsFee->fee, 'transaction' => $transactions]);
    }
}