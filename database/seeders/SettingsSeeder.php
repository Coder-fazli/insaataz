<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            'phone' => json_encode([]),
            'email' => json_encode([]),
            'address' => json_encode([]),
            'logo' => ' ',
            'facebook' => ' ',
            'instagram' => ' ',
            'youtube' => ' ',
            'tiktok' => ' ',
        ]);
    }
}
