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
        $this->info('Adding General fittings keyword to category 112 product titles...');

        // Get products from category 112 (İnşaat Fittinqler)
        $products = Product::where('category_id', 112)
            ->where('status', 1)
            ->get();

        $updated = 0;

        foreach ($products as $product) {
            $title = $product->title ?? [];
            $modified = false;

            // Add to Azerbaijani title
            if (isset($title['az'])) {
                if (stripos($title['az'], 'General fittings') === false) {
                    $title['az'] = trim($title['az']) . ' General fittings';
                    $modified = true;
                }
            }

            // Add to English title
            if (isset($title['en'])) {
                if (stripos($title['en'], 'General fittings') === false) {
                    $title['en'] = trim($title['en']) . ' General fittings';
                    $modified = true;
                }
            }

            // Add to Russian title
            if (isset($title['ru'])) {
                if (stripos($title['ru'], 'General fittings') === false) {
                    $title['ru'] = trim($title['ru']) . ' General fittings';
                    $modified = true;
                }
            }

            if ($modified) {
                $product->title = $title;
                $product->save();
                $updated++;
            }
        }

        $this->info("Successfully updated {$updated} product titles!");
        return 0;
    }
}
