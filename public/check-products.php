<?php
// Check products in Dekorativ Radiatorlar category
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h2>Products in Category 95 (Dekorativ Radiatorlar):</h2>";

$products = DB::table('products')->where('category_id', 95)->get();

echo "<p>Total products: " . count($products) . "</p>";

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Title (raw JSON)</th><th>Category ID</th></tr>";

foreach ($products as $p) {
    echo "<tr>";
    echo "<td>{$p->id}</td>";
    echo "<td>" . htmlspecialchars($p->title) . "</td>";
    echo "<td>{$p->category_id}</td>";
    echo "</tr>";
}
echo "</table>";

// Also show all categories with "radiator" in name
echo "<h2>Categories with 'radiator' in name:</h2>";
$categories = DB::table('categories')
    ->whereRaw("LOWER(title) LIKE '%radiator%'")
    ->get();

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Title</th><th>Parent ID</th></tr>";
foreach ($categories as $c) {
    echo "<tr><td>{$c->id}</td><td>" . htmlspecialchars($c->title) . "</td><td>{$c->parent_id}</td></tr>";
}
echo "</table>";
