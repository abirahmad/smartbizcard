<?php

namespace Database\Seeders;

use App\Models\MemberPlan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
    public function run()
    {
        $plan = [
            [
               'user_id'=>1,
               'name'=>'Entreprenuer',
               'monthly_price'=>200,
               'annual_price'=>1,
               'lifetime_price'=>1,
               'recommended'=>1,
               'scan_limit_per_month'=>1,
               'frequency'=>0,
               'additional_field_limit'=>1,
               'options'=>'Optional Customization Available',
               'hide_branding'=>1,
               'status'=>1,
               'customize_card'=>30,
               'team_member'=>null,
               'image'=>'small_business-image1.png',
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now()
            ],
            [
                'user_id'=>1,
                'name'=>'Small Business',
                'monthly_price'=>200,
                'annual_price'=>1,
                'lifetime_price'=>1,
                'recommended'=>1,
                'scan_limit_per_month'=>30,
                'frequency'=>1,
                'additional_field_limit'=>1,
                'options'=>null,
                'hide_branding'=>1,
                'status'=>1,
                'customize_card'=>20,
                'team_member'=>1,
                'image'=>'small_business-image1.png',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'user_id'=>1,
                'name'=>'Corporation',
                'monthly_price'=>200,
                'annual_price'=>1,
                'lifetime_price'=>1,
                'recommended'=>1,
                'scan_limit_per_month'=>1,
                'frequency'=>2,
                'additional_field_limit'=>1,
                'options'=>'Unlimited',
                'hide_branding'=>1,
                'status'=>1,
                'customize_card'=>30,
                'team_member'=>20,
                'image'=>'small_business-image1.png',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ]
        ];
  
        foreach ($plan as $key => $val) {
            MemberPlan::create($val);
        }
    }
}
