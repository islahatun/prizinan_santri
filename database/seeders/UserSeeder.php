<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => hash::make('admin123'),
                'role_id' => '1',
            ],
            [
                'name' => 'Pengasuh',
                'email' => 'pengasuh@gmail.com',
                'password' => hash::make('pengasuh123'),
                'role_id' => '2',
            ],
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'password' => hash::make('user123'),
                'role_id' => '3',

            ],
            [
                'id' => 4,
                'name' => 'kepala Pondok',
                'email' => 'masterpondok@gmail.com',
                'password' => hash::make('master123'),
                'role_id' => '4',
            ]
        ];

        foreach ($user as $key => $value) {
            DB::table('users')->insert($value);
        }
    }
}
