<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPlan extends Model
{
    use HasFactory;


    // public function plan_custom_setting_get()
    // {
    //     return $this->belongsToMany(CustomSetting::class, 'plan_custom_settings', 'plan_id', 'custom_setting_id');
    // }
     public function custom_settings()
    {
        return $this->belongsToMany(CustomSetting::class,'plan_custom_settings', 'plan_id', 'custom_setting_id')->withPivot(
            'plan_id',
            'custom_setting_id'
            );
    }
}
