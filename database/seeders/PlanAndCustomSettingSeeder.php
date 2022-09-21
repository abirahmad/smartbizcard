<?php

namespace Database\Seeders;

use App\Models\PlanCustomSetting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlanAndCustomSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
    public function run()
    {
        $relation = [
            [
               'plan_id'=>1,
               'custom_setting_id'=>1,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now()
            ],
            [
                'plan_id'=>2,
                'custom_setting_id'=>5,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'plan_id'=>2,
                'custom_setting_id'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'plan_id'=>2,
                'custom_setting_id'=>3,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'plan_id'=>3,
                'custom_setting_id'=>5,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'plan_id'=>3,
                'custom_setting_id'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'plan_id'=>3,
                'custom_setting_id'=>3,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'plan_id'=>3,
                'custom_setting_id'=>4,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
            
        ];
  
        foreach ($relation as $key => $val) {
            PlanCustomSetting::create($val);
        }
    }
}
