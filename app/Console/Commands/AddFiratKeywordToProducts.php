<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AddFiratKeywordToProducts extends Command
{
    protected $signature = 'products:add-firat-keyword';
    protected $description = 'Add Fırat keyword to Dubleks PVC products for better search results';

    public function handle()
    {
        $this->info('Adding Fırat keyword to category 121 products...');

        // Get products from category 121 (Dubleks PVC)
        $products = Product::where('category_id', 121)
            ->where('status', 1)
            ->get();

        $updated = 0;

        foreach ($products as $product) {
            $desc = $product->desc ?? [];
            $modified = false;

            // Add to Azerbaijani description
            if (isset($desc['az'])) {
                if (stripos($desc['az'], 'Fırat') === false) {
                    $desc['az'] = trim($desc['az']) . ' Fırat';
                    $modified = true;
                }
            } else {
                $desc['az'] = 'Fırat';
                $modified = true;
            }

            // Add to English description
            if (isset($desc['en'])) {
                if (stripos($desc['en'], 'Firat') === false) {
                    $desc['en'] = trim($desc['en']) . ' Firat';
                    $modified = true;
                }
            } else {
                $desc['en'] = 'Firat';
                $modified = true;
            }

            if ($modified) {
                $product->desc = $desc;
                $product->save();
                $updated++;
            }
        }

        $this->info("Successfully updated {$updated} products!");
        return 0;
    }
}
