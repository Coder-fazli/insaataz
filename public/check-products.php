<?php
// Check products with Garda, Mood, etc in title
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h2>Searching for products with Garda, Mood, Tribeca, Arte, Aluminium in title:</h2>";

$products = DB::table('products')
    ->where(function($q) {
        $q->whereRaw("title LIKE '%Garda%'")
          ->orWhereRaw("title LIKE '%Mood%'")
          ->orWhereRaw("title LIKE '%Tribeca%'")
          ->orWhereRaw("title LIKE '%Arte%'")
          ->orWhereRaw("title LIKE '%lüminium%'");
    })
    ->get();

echo "<p>Total found: " . count($products) . "</p>";

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Title</th><th>Category ID</th></tr>";
foreach ($products as $p) {
    echo "<tr>";
    echo "<td>{$p->id}</td>";
    echo "<td>" . htmlspecialchars($p->title) . "</td>";
    echo "<td>{$p->category_id}</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h2>All categories with 'dekorativ' or 'radiator':</h2>";
$categories = DB::table('categories')
    ->whereRaw("LOWER(title) LIKE '%dekorativ%' OR LOWER(title) LIKE '%radiator%'")
    ->get();

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Title</th><th>Parent ID</th></tr>";
foreach ($categories as $c) {
    echo "<tr><td>{$c->id}</td><td>" . htmlspecialchars($c->title) . "</td><td>{$c->parent_id}</td></tr>";
}
echo "</table>";
