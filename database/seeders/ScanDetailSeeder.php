<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ScanDetailSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();

        foreach(range(1, 100) as $index)
        {
            DB::table('scan_details')->insert([
                'user_id' => 2,
                'ip_address' => '12.0.0.1',
                'reference' => 'test',
                'created_at' => $faker->dateTimeBetween('-6 month', '+1 month'),
            ]);
        }
    }
}
