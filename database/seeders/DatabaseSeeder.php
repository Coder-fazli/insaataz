<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "admin",
            'email' => 'nicatmemmedzade@hotmail.com',
            'password' => Hash::make('Test123.')
        ]);
        $this->call([
            TranslationsSeeder::class,
            AboutSeeder::class,
            SettingsSeeder::class
        ]);
    }
}
