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
        'nis' => 1,
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => hash::make('admin123'),
        'role' => 'admin',
      ],
      [
        'nis' => 2,
        'name' => 'Petugas',
        'email' => 'petugas@gmail.com',
        'password' => hash::make('petugas123'),
        'role' => 'petugas',
      ],
      [
        'nis' => 100101,
        'name' => 'User1',
        'email' => 'user1@gmail.com',
        'password' => hash::make('user123'),

      ]
    ];

    foreach ($user as $key => $value) {
      DB::table('users')->insert($value);
    }
  }
}
