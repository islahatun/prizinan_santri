<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
              'id' => 1,
              'nama_role' => 'Kepala Pondok'
            ],
            [
              'id' => 2,
              'nama_role' => 'Pengasuh'
            ],
            [
              'id' => 3,
              'nama_role' => 'User'
            ],
            [
              'id' => 4,
              'nama_role' => 'Admin'
            ],
          ];

          foreach ($role as $role) {
            DB::table('roles')->insert($role);
          }
    }
}
