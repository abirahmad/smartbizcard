<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MemberPlan;
use App\Models\Admin_Tax;
use App\Models\Plan_Tax;
use App\Models\CustomSetting;
use App\Models\PlanCustomSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
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

    public function store(Request $request)
    {

        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required|max:255',
            'monthly_price' => 'required|numeric',
            'annual_price' => 'required|numeric',
            'lifetime_price' => 'required|numeric',
            'frequency' => 'required',
            'custom_setting' => 'required',
            'taxes_ids' => 'required',
        ]);
        try {
            $data = new MemberPlan;
            $data->user_id = auth()->user()->id;
            $data->name = $request->name;
            $data->monthly_price = $request->monthly_price;
            $data->annual_price = $request->annual_price;
            $data->lifetime_price = $request->lifetime_price;
            $data->frequency = $request->frequency;
            if ($request->recommended == 'on') {
                $data->recommended = 'yes';
            } else {
                $data->recommended = 'no';
            }
            $data->scan_limit_per_month = $request->scan_limit_per_month;
            $data->additional_field_limit = $request->additional_field_limit;
            if ($request->hide_branding == 'on') {
                $data->hide_branding = 'yes';
            } else {
                $data->hide_branding = 'no';
            }
            if ($request->status == 'on') {
                $data->status = true;
            } else {
                $data->status = false;
            }
            $data->team_member = $request->team_member;
            $data->customize_card = $request->customize_card;
            $data->save();

            foreach ($request->custom_setting as $setting) {
                $item = new PlanCustomSetting();
                $item->plan_id = $data->id;
                $item->custom_setting_id = $setting;
                $item->save();
            }

            foreach ($request->taxes_ids as $taxes_id) {
                $item = new Plan_Tax();
                $item->plan_id = $data->id;
                $item->tax_id = $taxes_id;
                $item->save();
            }
            $notification = array(
                'Message' => 'Plan Created successfully!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } catch (\Exception $e) {
            session()->flash('error', 'Something Went Wrong');
            DB::rollBack();
            return back();
        }
       
    }

    public function edit($id)
    {

        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        $paln_details = MemberPlan::Find($id);
        $taxes = Admin_Tax::select('id', 'name')->get();
        $editTax = Plan_Tax::where('plan_id', $id)->get();
        $settings = CustomSetting::select('id', 'title')->get();
        $editSetting = PlanCustomSetting::where('plan_id', $id)->get();
        return view('admin.membership.plan.edit', compact('paln_details', 'taxes', 'editTax', 'settings', 'editSetting'));
    }

    public function update(Request $request, $id)
    {

        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|max:255',
            'monthly_price' => 'required|numeric',
            'annual_price' => 'required|numeric',
            'lifetime_price' => 'required|numeric',
            'frequency' => 'required',
            'custom_setting' => 'required',
            'taxes_ids' => 'required',
        ]);
try{
        DB::beginTransaction();
        $update_plan = MemberPlan::Find($id);
        $update_plan->user_id = auth()->user()->id;
        $update_plan->name = $request->name;
        $update_plan->monthly_price = $request->monthly_price;
        $update_plan->annual_price = $request->annual_price;
        $update_plan->lifetime_price = $request->lifetime_price;
        $update_plan->frequency = $request->frequency;
        if ($request->recommended == 'on') {
            $update_plan->recommended = 'yes';
        } else {
            $update_plan->recommended = 'no';
        }
        $update_plan->scan_limit_per_month = $request->scan_limit_per_month;
        $update_plan->additional_field_limit = $request->additional_field_limit;
        if ($request->hide_branding == 'on') {
            $update_plan->hide_branding = 'yes';
        } else {
            $update_plan->hide_branding = 'no';
        }
        if ($request->status == 'on') {
            $update_plan->status = true;
        } else {
            $update_plan->status = false;
        }
        $update_plan->team_member = $request->team_member;
        $update_plan->customize_card = $request->customize_card;
        $update_plan->update();


        //update custom setting
        $remove_custom_setting = PlanCustomSetting::where('plan_id', $id)->get();

        foreach ($remove_custom_setting as $data) {
            PlanCustomSetting::where('plan_id', $id)->delete();
        }

        foreach ($request->custom_setting as $setting) {
            $item = new PlanCustomSetting();
            $item->plan_id = $id;
            $item->custom_setting_id = $setting;
            $item->save();
        }

        //update tax

        $remove_old_data = Plan_Tax::where('plan_id', $id)->get();

        foreach ($remove_old_data as $data) {
            Plan_Tax::where('plan_id', $id)->delete();
        }

        foreach ($request->taxes_ids as $taxes_id) {
            $item = new Plan_Tax();
            $item->plan_id = $id;
            $item->tax_id = $taxes_id;
            $item->save();
        }

        $notification = array(
            'Message' => 'Plan updated successfully!',
            'alert-type' => 'success'
        );
        DB::commit();
    } catch (\Exception $e) {
        session()->flash('error', 'Something Went Wrong');
        DB::rollBack();
        return back();
    }
        return redirect()->route('admin.memberships.index')->with($notification);
    }
    public function destroy($id)
    {

        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        //delete custom setting
        $remove_custom_setting = PlanCustomSetting::where('plan_id', $id)->get();

        foreach ($remove_custom_setting as $data) {
            PlanCustomSetting::where('plan_id', $id)->delete();
        }

        //delete tax
        $remove_old_data = Plan_Tax::where('plan_id', $id)->get();

        foreach ($remove_old_data as $data) {
            Plan_Tax::where('plan_id', $id)->delete();
        }

        //delete plan
        $destroy = MemberPlan::Find($id);
        $destroy->delete();
        $notification = array(
            'Message' => 'Item remove from list successfully!',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }

    public function statusUpdate(Request $request, $id)
    {
        // return $request->status;
        $plan = MemberPlan::where('id', $id)->update(['status' => $request->status]);
        $notification = array(
            'Message' => 'Status updated successfully!',
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }
}
