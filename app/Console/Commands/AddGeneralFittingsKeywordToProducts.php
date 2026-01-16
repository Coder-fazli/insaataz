<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class AddGeneralFittingsKeywordToProducts extends Command
{
    protected $signature = 'products:add-general-fittings-keyword';
    protected $description = 'Add General fittings keyword to İnşaat Fittinqler products for better search results';

    public function handle()
    {
        $this->info('Adding General fittings keyword to category 112 products...');

        // Get products from category 112 (İnşaat Fittinqler)
        $products = Product::where('category_id', 112)
            ->where('status', 1)
            ->get();

        $updated = 0;

        foreach ($products as $product) {
            $desc = $product->desc ?? [];
            $modified = false;

            // Add to Azerbaijani description
            if (isset($desc['az'])) {
                if (stripos($desc['az'], 'General fittings') === false) {
                    $desc['az'] = trim($desc['az']) . ' General fittings';
                    $modified = true;
                }
            } else {
                $desc['az'] = 'General fittings';
                $modified = true;
            }

            // Add to English description
            if (isset($desc['en'])) {
                if (stripos($desc['en'], 'General fittings') === false) {
                    $desc['en'] = trim($desc['en']) . ' General fittings';
                    $modified = true;
                }
            } else {
                $desc['en'] = 'General fittings';
                $modified = true;
            }

            // Add to Russian description
            if (isset($desc['ru'])) {
                if (stripos($desc['ru'], 'General fittings') === false) {
                    $desc['ru'] = trim($desc['ru']) . ' General fittings';
                    $modified = true;
                }
            } else {
                $desc['ru'] = 'General fittings';
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
