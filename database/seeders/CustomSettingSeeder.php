<?php

namespace Database\Seeders;

use App\Models\CustomSetting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CustomSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customSetting = [
            [
               'title'=>'Update Your Card Info Anytime',
               'status'=>1,
               'created_at'=>Carbon::now()
            ],
            [
                'title'=>'Custom Sales Contest',
                'status'=>1,
                'created_at'=>Carbon::now()
            ],
            [
                'title'=>'White Labeled Dashboard',
                'status'=>1,
                'created_at'=>Carbon::now()
            ],
            [
                'title'=>'Integrated CRM',
                'status'=>1,
                'created_at'=>Carbon::now()
            ],
            [
                'title'=>'Email Support',
                'status'=>1,
                'created_at'=>Carbon::now()
            ],
        ];
  
        foreach ($customSetting as $key => $val) {
            CustomSetting::create($val);
        }
    }
}
