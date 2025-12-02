<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    public function run()
    {
        DB::table('about')->truncate();
        DB::table('about')->insert([
            'title' => json_encode([]),
            'description' => json_encode([]),
        ]);
    }
}
