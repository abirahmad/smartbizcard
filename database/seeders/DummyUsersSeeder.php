<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'first_name' => 'Abir',
                'last_name' => 'Ahmad',
                'username' => 'abir',
                'email' => 'abir@gmail.com',
                'image' => 'image.jpg',
                'is_admin' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'first_name' => 'Test',
                'last_name' => 'User',
                'username' => 'test',
                'email' => 'test@gmail.com',
                'image' => 'image.jpg',
                'is_admin' => '0',
                'password' => bcrypt('test123'),
            ],
            [
                'first_name' => 'Test2',
                'last_name' => 'User',
                'username' => 'test2',
                'email' => 'test2@gmail.com',
                'image' => 'image.jpg',
                'is_admin' => '0',
                'password' => bcrypt('test123'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
