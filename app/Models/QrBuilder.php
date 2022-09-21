<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrBuilder extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'foreground_color',
        'background_color',
        'qr_text',
        'text_color',
        'qr_size',
        'created_at',
        'updated_at',
    ];
}
