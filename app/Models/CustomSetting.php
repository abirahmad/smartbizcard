<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSetting extends Model
{
    use HasFactory;

    public function plans()
    {
        return $this->belongsToMany(MemberPlan::class,'plan_custom_settings', 'custom_setting_id', 'plan_id')->withPivot(
            'plan_id',
            'custom_setting_id'
            );
    }
}
