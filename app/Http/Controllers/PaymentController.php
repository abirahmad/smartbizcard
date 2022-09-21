<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberPlan;


class PaymentController extends Controller
{
    /**
     * Payment Invoice
     * 
     */

     public function paymentInvoice($id){
         if(auth()->check()){
            $amount = MemberPlan::where('id',$id)->first();
            return view('payment.invoice',compact('amount'));
         }
     }

     public function paymentCheckout($id)
     {
        // $data = MemberPlan::find($id);
        // compact('data');
        return view('payment.invoice');
     }
}
