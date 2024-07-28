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
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => hash::make('password'),
        'role_id' => 1,
      ],
      [
        'name' => 'Petugas',
        'email' => 'petugas@gmail.com',
        'password' => hash::make('password'),
        'role_id' => 4,
      ],
      [
        'name' => 'User1',
        'email' => 'user1@gmail.com',
        'role_id' => 3,
        'password' => hash::make('password'),

      ]
    ];

    foreach ($user as $key => $value) {
      DB::table('users')->insert($value);
    }
  }
}
