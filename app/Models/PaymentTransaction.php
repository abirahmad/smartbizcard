<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'card_name',
        'card_number',
        'cvc',
        'exp_month',
        'exp_year',
        'email',
        'plan_name',
        'plan_id',
        'plan_expire_date',
        'reminder_date',
        'seller_id',
        'amount',
        'base_amount',
        'featured',
        'urgent',
        'highlight',
        'transaction_time',
        'transaction_status',
        'payment_id',
        'transaction_gatway',
        'transaction_ip',
        'transaction_description',
        'transaction_method',
        'frequency',
        'billing',
        'taxes_ids',
    ];
}
