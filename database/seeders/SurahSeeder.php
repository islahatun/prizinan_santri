<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surahs = [
            ['name' => 'Al-Fatihah'],
            ['name' => 'Al-Baqarah'],
            ['name' => 'Aali Imran'],
            ['name' => 'An-Nisa'],
            ['name' => 'Al-Ma’idah'],
            ['name' => 'Al-An’am'],
            ['name' => 'Al-A’raf'],
            ['name' => 'Al-Anfal'],
            ['name' => 'At-Tawbah'],
            ['name' => 'Yunus'],
            ['name' => 'Hud'],
            ['name' => 'Yusuf'],
            ['name' => 'Ar-Ra’d'],
            ['name' => 'Ibrahim'],
            ['name' => 'Al-Hijr'],
            ['name' => 'An-Nahl'],
            ['name' => 'Al-Isra'],
            ['name' => 'Al-Kahf'],
            ['name' => 'Maryam'],
            ['name' => 'Ta-Ha'],
            ['name' => 'Al-Anbiya'],
            ['name' => 'Al-Hajj'],
            ['name' => 'Al-Mu’minun'],
            ['name' => 'An-Nur'],
            ['name' => 'Al-Furqan'],
            ['name' => 'Ash-Shu’ara'],
            ['name' => 'An-Naml'],
            ['name' => 'Al-Ankabut'],
            ['name' => 'Ar-Rum'],
            ['name' => 'Luqman'],
            ['name' => 'As-Sajdah'],
            ['name' => 'Al-Ahzab'],
            ['name' => 'Saba’'],
            ['name' => 'Fatir'],
            ['name' => 'Ya-Sin'],
            ['name' => 'As-Saffat'],
            ['name' => 'Sad'],
            ['name' => 'Az-Zumar'],
            ['name' => 'Fussilat'],
            ['name' => 'Ash-Shura'],
            ['name' => 'Az-Zukhruf'],
            ['name' => 'Ad-Dukhan'],
            ['name' => 'Al-Jathiya'],
            ['name' => 'Al-Ahqaf'],
            ['name' => 'Muhammad'],
            ['name' => 'Al-Fath'],
            ['name' => 'Al-Hujurat'],
            ['name' => 'Qaf'],
            ['name' => 'Adh-Dhariyat'],
            ['name' => 'At-Tur'],
            ['name' => 'An-Najm'],
            ['name' => 'Al-Qamar'],
            ['name' => 'Ar-Rahman'],
            ['name' => 'Al-Waqi’ah'],
            ['name' => 'Al-Hadid'],
            ['name' => 'Al-Mujadila'],
            ['name' => 'Al-Hashr'],
            ['name' => 'Al-Mumtahina'],
            ['name' => 'As-Saff'],
            ['name' => 'Al-Jumua'],
            ['name' => 'Al-Munafiqun'],
            ['name' => 'At-Taghabun'],
            ['name' => 'At-Tahrim'],
            ['name' => 'Al-Mulk'],
            ['name' => 'Al-Qalam'],
            ['name' => 'Al-Haaqqa'],
            ['name' => 'Al-Maarij'],
            ['name' => 'Nuh'],
            ['name' => 'Al-Jinn'],
            ['name' => 'Al-Muzzammil'],
            ['name' => 'Al-Muddathir'],
            ['name' => 'Al-Qiyama'],
            ['name' => 'Al-Insan'],
            ['name' => 'Al-Mursalat'],
            ['name' => 'An-Naba'],
            ['name' => 'An-Nazi’at'],
            ['name' => 'Abasa'],
            ['name' => 'At-Takwir'],
            ['name' => 'Al-Infitar'],
            ['name' => 'Al-Takathur'],
            ['name' => 'Al-Asr'],
            ['name' => 'Al-Humazah'],
            ['name' => 'Al-Fil'],
            ['name' => 'Quraish'],
            ['name' => 'Al-Ma’un'],
            ['name' => 'Al-Kawthar'],
            ['name' => 'Al-Kafirun'],
            ['name' => 'An-Nasr'],
            ['name' => 'Al-Masad'],
            ['name' => 'Al-Ikhlas'],
            ['name' => 'Al-Falaq'],
            ['name' => 'An-Nas'],
        ];

        foreach ($surahs as $surah) {
            DB::table('surahs')->insert($surah);
        }
    }
}
