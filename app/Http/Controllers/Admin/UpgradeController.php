<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberPlan;
use App\Models\PaymentTransaction;

class UpgradeController extends Controller
{
    public function index()
    {
        // $items = MemberPlan::select('member_plans.name', 'member_plans.created_at', 'member_plans.expire_date', 'users.username')
        // ->leftjoin('users','users.id','=','member_plans.user_id')
        // ->get();

        $items = PaymentTransaction::select('users.username', 'payment_transactions.id', 'payment_transactions.plan_name', 'payment_transactions.created_at', 'payment_transactions.plan_expire_date')
        ->leftjoin('users', 'users.id', '=', 'payment_transactions.user_id')
        ->orderBy('id', 'desc')->get();
        return view('admin.membership.upgrads.index', compact('items'));
    }
}
