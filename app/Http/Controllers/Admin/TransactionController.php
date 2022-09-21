<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentTransaction;
use App\Models\PaymentRecord;

class TransactionController extends Controller
{
    public function transactionList()
    {
        $transactionLists = PaymentRecord::select('payment_records.id', 'users.username', 'payment_records.card_name', 'payment_records.email', 'payment_records.plan_name', 'payment_records.amount', 'payment_transactions.transaction_status')
        ->leftjoin('users', 'users.id', '=', 'payment_records.user_id')
        ->leftjoin('payment_transactions', 'payment_transactions.id', '=', 'payment_records.payment_transaction_id')
        ->orderBy('id', 'desc')->get();
        return view('admin.transaction.index', compact('transactionLists'));
    }
}
