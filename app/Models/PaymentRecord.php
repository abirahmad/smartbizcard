<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'payment_transaction_id',
        'card_name',
        'email',
        'plan_name',
        'plan_id',
        'amount',
        'payment_id',
        'transaction_method',
        'frequency',
    ];
}
