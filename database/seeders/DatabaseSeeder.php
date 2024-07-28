<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // php artisan db:seed --class=SurahSeeder  -> untuk menjalankan seed surah
          // php artisan db:seed --class=UserSeeder  -> untuk menjalankan seed surah

    }
}
