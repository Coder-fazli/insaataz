<?php
// Visit: https://orelinsaat.az/add-fondital-prefix.php
// DELETE THIS FILE AFTER RUNNING!

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h2>Adding 'Fondital' prefix to product titles...</h2>";
echo "<p>Category: Dekorativ Radiatorlar (ID: 96)</p>";

// Prefixes to search for
$prefixes = ['Garda', 'Mood', 'Tribeca', 'Arte', 'Alüminium'];
$categoryId = 96; // Dekorativ Radiatorlar

$totalUpdated = 0;

foreach ($prefixes as $prefix) {
    echo "<h3>Processing titles starting with '{$prefix}':</h3>";

    // Get products from category 95 where title starts with this prefix (in any language)
    $products = DB::table('products')
        ->where('category_id', $categoryId)
        ->where(function($query) use ($prefix) {
            $query->whereRaw("JSON_EXTRACT(title, '$.az') LIKE ?", ["{$prefix}%"])
                  ->orWhereRaw("JSON_EXTRACT(title, '$.en') LIKE ?", ["{$prefix}%"])
                  ->orWhereRaw("JSON_EXTRACT(title, '$.ru') LIKE ?", ["{$prefix}%"]);
        })
        ->get();

    if ($products->isEmpty()) {
        echo "<p>No products found starting with '{$prefix}'</p>";
        continue;
    }

    foreach ($products as $product) {
        $title = json_decode($product->title, true);
        $updated = false;

        // Check each language and add Fondital prefix if not already present
        foreach (['az', 'en', 'ru'] as $lang) {
            if (isset($title[$lang]) && !empty($title[$lang])) {
                // Check if title starts with the prefix and doesn't already have Fondital
                if (stripos($title[$lang], $prefix) === 0 && stripos($title[$lang], 'Fondital') !== 0) {
                    $title[$lang] = 'Fondital ' . $title[$lang];
                    $updated = true;
                }
            }
        }

        if ($updated) {
            DB::table('products')
                ->where('id', $product->id)
                ->update(['title' => json_encode($title, JSON_UNESCAPED_UNICODE)]);

            echo "<p>✅ Updated ID {$product->id}: " . htmlspecialchars(json_encode($title, JSON_UNESCAPED_UNICODE)) . "</p>";
            $totalUpdated++;
        } else {
            echo "<p>⚠️ Skipped ID {$product->id} (already has Fondital or no match)</p>";
        }
    }
}

echo "<h2 style='color:green;'>✅ DONE! Updated {$totalUpdated} products.</h2>";
echo "<p><strong>Delete this file now!</strong></p>";
