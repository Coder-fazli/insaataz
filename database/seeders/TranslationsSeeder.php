<?php

namespace Database\Seeders;

use App\Models\Translate;
use Arr;
use DB;
use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class TranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('language_lines')->truncate();
        foreach ($this->getTranslations() as $group => $translates) {
            foreach ($translates as $prefix => $translations) {
                $withPrefix = Arr::isAssoc($translations);
                if (!$withPrefix) {
                    $translations = [$translations];
                }

                foreach ($translations as $key => $text) {
                    $translate = \DB::table('language_lines')
                        ->where('group', $group)
                        ->where('key', $withPrefix ? "$prefix.$key" : $prefix);


                    $text = json_encode([
                        'az' => $text[0],
                        'en' => $text[1],
                        'ru' => $text[2]
                    ]);

                    if (!$translate->first()) {
                        $translate->insert([
                            'group' => $group,
                            'key' => $withPrefix ? "$prefix.$key" : $prefix,
                            'text' => $text
                        ]);
                    }

                }
            }
        }

        // clear cache
        Translate::first()->save();
    }

    private function getTranslations(): array
    {
        return [
            'menu' => [
                'home' => ['Ana Səhifə', '', ''],
                'about' => ['Haqqımızda', 'About us', 'О Нас'],
                'blog' => ['Bloq', '', ''],
                'contact' => ['Əlaqə', '', ''],
                'celd_kecid' => ['celd kecid', '', ''],
            ],
            'site' => [

                'phone' => [' Phone', '', ''],
                'play' => [' Play', '', ''],
                'email' => ['Email', '', ''],
                'address' => ['Address', '', ''],
                'submit' => ['Send', '', ''],
                'read_more' => ['Read More', '', ''],
                'best_seller' => ['Best Seller', '', ''],
                'relatedProducts' => ['RELATED PRODUCTS', '', ''],
                'additional' => ['Additional Information', '', ''],
                'price_asc' => ['Sort by price: low to high', '', ''],
                'price_desc' => ['Sort by price: high to low', '', ''],

            ],
            'footer'=>[
                'contact_info'=>['Contact Info','',''],
                'links'=>['Cəld Keçidlər','',''],
                'follow_us' => ['Follow Us', '', ''],
            ],


            'contact_form' => [
                'name' => ['AD SOYAD', '', ''],
                'surname' => ['SOYAD', '', ''],
                'phone' => ['Telefon', '', ''],
                'note' => ['ƏLAVƏ QEYD', '', ''],
                'email' => ['Email', '', ''],
                'message' => ['Message', '', ''],
            ],


        ];
    }
}
