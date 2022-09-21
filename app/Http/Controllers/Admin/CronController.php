<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentTransaction;
class CronController extends Controller
{
    public function index()
    {
        $expired_plans = PaymentTransaction::where('status', 0)
                        ->orderBy('plan_expire_date', 'desc')->get();
        return view('admin.membership.croneJobs.index', compact('expired_plans'));
    }
}
