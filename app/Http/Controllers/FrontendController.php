<?php

namespace App\Http\Controllers;

use App\Models\MemberPlan;
use App\Models\CustomSetting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        
        // $fPlans=MemberPlan::with('plan_custom_setting_get')->get();
        $fPlans=MemberPlan::with('custom_settings')->get();
        $c_settings = CustomSetting::with('plans')->get();
        return view('welcome',compact('fPlans','c_settings'));
    }

    public function planDetails($id){
        $plan_details=MemberPlan::with('custom_settings')->where('id',$id)->first();
        // dd($plan_details);
        return view('membership.plan_details',compact('plan_details'));
    }

    public function showPrivacyPolicy(){
        return view('privacy');
    }

    public function showTermsAndServices(){
        return view('terms');
    }
}
