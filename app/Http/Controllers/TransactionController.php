<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\PaymentTransaction;
use App\Models\PaymentRecord;
class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
    
            return $next($request);
        });
    }
    public function index(){
        $getUserId = Auth::user()->id;
        $transactionListByUser = PaymentRecord::select(
            'payment_records.id',
            'payment_records.card_name', 
            'users.username', 
            'payment_records.email', 
            'payment_records.plan_name', 
            'payment_records.amount', 
            'payment_transactions.transaction_status', 
            'payment_records.created_at')
        ->leftjoin('users', 'users.id', '=', 'payment_records.user_id')
        ->leftjoin('payment_transactions', 'payment_transactions.id', '=', 'payment_records.payment_transaction_id')
        ->where('payment_records.user_id', $getUserId)
        ->orderBy('id', 'desc')->get();
        return view('transaction.transaction', compact('transactionListByUser'));
    }
}
