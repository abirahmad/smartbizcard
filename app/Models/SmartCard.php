<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartCard extends Model
{
    // use HasFactory;
    public $table='vcards';
    protected $fillable = [
        'user_id', 'slug', 'title','main_image','cover_image', 'full_name','email','phone','description','details','color','status'
    ];
}
