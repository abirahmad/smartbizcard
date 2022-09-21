<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MemberPlan;
use App\Models\Admin_Tax;
use App\Models\CustomSetting;

class MembershipController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $items = MemberPlan::select('id', 'name', 'monthly_price', 'annual_price', 'lifetime_price', 'status')->get();
        $taxes = Admin_Tax::select('id', 'name')->get();
        $settings = CustomSetting::select('id', 'title', 'status')->get();
        return view('admin.membership.plan.index', compact('items', 'taxes', 'settings'));
    }

    public function customeSettings()
    {
        
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        return view('admin.membership.custom.index');
    }

    public function upgrads()
    {
        
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        return view('admin.membership.upgrads.index');
    }

    public function croneJobs()
    {
        
        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        return view('admin.membership.croneJobs.index');
    }

}
