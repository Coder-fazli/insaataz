<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Products with Calidor or Blitz Super in their name
        $prefixes = ['Calidor', 'Blitz Super'];

        foreach ($prefixes as $prefix) {
            $products = DB::table('products')
                ->where(function($query) use ($prefix) {
                    $query->whereRaw("JSON_EXTRACT(title, '$.az') LIKE ?", ["{$prefix}%"])
                          ->orWhereRaw("JSON_EXTRACT(title, '$.en') LIKE ?", ["{$prefix}%"])
                          ->orWhereRaw("JSON_EXTRACT(title, '$.ru') LIKE ?", ["{$prefix}%"]);
                })
                ->get();

            foreach ($products as $product) {
                $title = json_decode($product->title, true);

                foreach (['az', 'en', 'ru'] as $lang) {
                    if (isset($title[$lang]) && !empty($title[$lang])) {
                        // Check if it starts with the prefix and doesn't already have Fondital
                        if (stripos($title[$lang], $prefix) === 0 && stripos($title[$lang], 'Fondital') !== 0) {
                            $title[$lang] = 'Fondital ' . $title[$lang];
                        }
                    }
                }

                DB::table('products')
                    ->where('id', $product->id)
                    ->update(['title' => json_encode($title, JSON_UNESCAPED_UNICODE)]);
            }
        }
    }

    public function down()
    {
        // Remove Fondital prefix from Calidor and Blitz Super products
        $prefixes = ['Calidor', 'Blitz Super'];

        foreach ($prefixes as $prefix) {
            $products = DB::table('products')
                ->whereRaw("JSON_EXTRACT(title, '$.az') LIKE ?", ["Fondital {$prefix}%"])
                ->get();

            foreach ($products as $product) {
                $title = json_decode($product->title, true);
                foreach (['az', 'en', 'ru'] as $lang) {
                    if (isset($title[$lang]) && stripos($title[$lang], 'Fondital ') === 0) {
                        $title[$lang] = substr($title[$lang], 9); // Remove "Fondital " (9 chars)
                    }
                }
                DB::table('products')
                    ->where('id', $product->id)
                    ->update(['title' => json_encode($title, JSON_UNESCAPED_UNICODE)]);
            }
        }
    }
};
