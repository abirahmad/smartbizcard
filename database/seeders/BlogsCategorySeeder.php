<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MemberPlan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class BlogsCategorySeeder extends Seeder
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
                'title'=>'Technology',
                'slug'=>'blog-category-1',
                'position'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
            [
                'title'=>'Literature',
                'slug'=>'blog-category-2',
                'position'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'title'=>'Thriller',
                'slug'=>'blog-category-3',
                'position'=>3,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
        ];
  
        foreach ($plan as $key => $val) {
            Category::create($val);
        }
    }
}
