<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Add Nobili partner
        if (!DB::table('partners')->where('title', 'Nobili')->exists()) {
            DB::table('partners')->insert([
                'title' => 'Nobili',
                'image' => 'partners/nobili-logo.jpg',
                'slug' => 'nobili',
                'link' => 'https://www.nobili.it/en/',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Add Carisa partner
        if (!DB::table('partners')->where('title', 'Carisa')->exists()) {
            DB::table('partners')->insert([
                'title' => 'Carisa',
                'image' => 'partners/carisa-logo.png',
                'slug' => 'carisa',
                'link' => 'https://carisa.com.tr/en/',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        DB::table('partners')->where('title', 'Nobili')->delete();
        DB::table('partners')->where('title', 'Carisa')->delete();
    }
};
