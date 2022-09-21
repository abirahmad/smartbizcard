<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentTransaction;
use App\Models\PaymentRecord;
use App\Models\MemberPlan;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Charge;
use Session;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function stripePost(Request $request)
    {
        try {

            $plan_id = $request->pt_id;
            $plan = MemberPlan::where('id', $plan_id)->first();
            Stripe::setApiKey(env('STRIPE_SECRET'));

            DB::beginTransaction();

            $data = Charge::create([
                "amount" => $plan->frequency == 0 ? $plan->monthly_price * 100 : ($plan->frequency == 1 ?  $plan->annual_price * 100 : $plan->lifetime_price * 100),
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "This payment is tested from SmartVcard"
            ]);

            
            if ($plan->frequency == 0) {

                $dateWTime = Carbon::now()->addMonth();
                $plan_expire_date = $dateWTime;

            } elseif ($plan->frequency == 1) {
                $dateWTime = Carbon::now()->addYear();
                $plan_expire_date = $dateWTime;
            } else {
                $plan_expire_date = 'Life Time Access';
            }

            if ($plan->frequency == 0) {
                $dateRm = Carbon::now()->addMonth();
                $rm_date =  $dateRm->subDays(7);
                $reminder_date = $rm_date->format('Y-m-d');
            } elseif ($plan->frequency == 1) {
                $dateRm = Carbon::now()->addYear();
                $rm_date =  $dateRm->subDays(7);
                $reminder_date = $rm_date->format('Y-m-d');
            } else {
                $reminder_date = 'Life Time Access';
            }

            $user_id = Auth::user()->id;

        $userTransaction = PaymentTransaction::where('user_id', $user_id)->first();
        if ($userTransaction !== null) {
            $userTransaction->update(
                [
                    'user_id' => $user_id,
                    'card_name' => $request->card_name,
                    'card_number'=> $request->card_number,
                    'cvc'=> $request->cvc,
                    'exp_month'=> $request->exp_month,
                    'exp_year'=> $request->exp_year,
                    'email'=> $request->email,
                    'plan_name'=> $plan->name,
                    'plan_id'=> $plan->id,
                    'plan_expire_date'=> $plan_expire_date,
                    'reminder_date'=> $reminder_date,
                    'seller_id'=> 1,
                    'amount'=> $plan->frequency == 0 ? $plan->monthly_price : ($plan->frequency == 1 ?  $plan->annual_price : $plan->lifetime_price),
                    'base_amount'=> 12,
                    'featured'=> 1,
                    'urgent'=> 0,
                    'highlight' => 1,
                    'transaction_time' => 3,
                    'transaction_status' => $data->status,
                    'payment_id' => $data->id,
                    'transaction_gatway' => 'test',
                    'transaction_ip' => 'test',
                    'transaction_description' => $data->description,
                    'transaction_method' => $data->payment_method,
                    'frequency' => $plan->frequency == 0 ? 'MONTHLY' : ($plan->frequency == 1 ? 'YEARLY' : 'LIFETIME'),
                    'billing' => "Test",
                    'taxes_ids' => "FREE",
                ]
            );
        } else {
            $userTransaction = PaymentTransaction::create(
                [
                    'user_id' => $user_id,
                    'card_name' => $request->card_name,
                    'card_number'=> $request->card_number,
                    'cvc'=> $request->cvc,
                    'exp_month'=> $request->exp_month,
                    'exp_year'=> $request->exp_year,
                    'email'=> $request->email,
                    'plan_name'=> $plan->name,
                    'plan_id'=> $plan->id,
                    'plan_expire_date'=> $plan_expire_date,
                    'reminder_date'=> $reminder_date,
                    'seller_id'=> 1,
                    'amount'=> $plan->frequency == 0 ? $plan->monthly_price : ($plan->frequency == 1 ?  $plan->annual_price : $plan->lifetime_price),
                    'base_amount'=> 12,
                    'featured'=> 1,
                    'urgent'=> 0,
                    'highlight' => 1,
                    'transaction_time' => 3,
                    'transaction_status' => $data->status,
                    'payment_id' => $data->id,
                    'transaction_gatway' => 'test',
                    'transaction_ip' => 'test',
                    'transaction_description' => $data->description,
                    'transaction_method' => $data->payment_method,
                    'frequency' => $plan->frequency == 0 ? 'MONTHLY' : ($plan->frequency == 1 ? 'YEARLY' : 'LIFETIME'),
                    'billing' => "Test",
                    'taxes_ids' => "FREE",
                ] 
            );
        }
        //After update or create the record Track new record
        $record = PaymentRecord::create(
                [
                    'user_id' => $user_id,
                    'payment_transaction_id' => $userTransaction->id,
                    'card_name' => $request->card_name,
                    'email' => $request->email,
                    'plan_name' => $plan->name,
                    'plan_id'=> $plan->id,
                    'amount' => $plan->frequency == 0 ? $plan->monthly_price : ($plan->frequency == 1 ?  $plan->annual_price : $plan->lifetime_price),
                    'payment_id' => $data->id,
                    'transaction_method' => $data->payment_method,
                    'frequency' => $plan->frequency == 0 ? 'MONTHLY' : ($plan->frequency == 1 ? 'YEARLY' : 'LIFETIME'),
                ]
            );


        // when any user buy a plan then her status will be 1 in users table of status column
        $userId = Auth::user()->id;
        $userStatusChange = User::where('id', $userId)->first();
        $userStatusChange->status = 1;
        $userStatusChange->update();
        //here update user status 

            $username = Auth::user()->username;
            $mytime = date("Y-m-d");
            $mailData = [
                'sl' => '1',
                'name' => $username,
                'email' => $request->email,
                'price' => $plan->frequency == 0 ? $plan->monthly_price : ($plan->frequency == 1 ?  $plan->annual_price : $plan->lifetime_price),
                'date' => $mytime
            ];

            \Mail::to($request->email)->send(new \App\Mail\EmailDemo($mailData));

            $notification = array(
                'Message' => 'Payment Successfully Done',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('transaction')->with($notification);
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
