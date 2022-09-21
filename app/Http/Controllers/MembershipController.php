<?php

namespace App\Http\Controllers;

use App\Models\MemberPlan;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
    
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->id;
        $user_plans = PaymentTransaction::select('payment_transactions.id', 'payment_transactions.plan_id', 'payment_transactions.plan_name', 'payment_transactions.created_at', 'payment_transactions.plan_expire_date', 'payment_transactions.amount')
                      ->where('payment_transactions.user_id', $user)
                      ->get();
        return view('membership.membership', compact('user_plans'));
    }
    
}
