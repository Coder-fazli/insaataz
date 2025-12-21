<?php
// Delete the broken partner entries (IDs 20-24)
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h2>Deleting broken partner entries...</h2>";

// Delete IDs 20-24 (the ones I wrongly added)
$deleted = DB::table('partners')->whereIn('id', [20, 21, 22, 23, 24])->delete();

echo "<p>Deleted {$deleted} entries</p>";

// Show remaining partners
echo "<h3>Remaining Partners:</h3>";
$partners = DB::table('partners')->get();
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Title</th><th>Link</th><th>Image</th></tr>";
foreach ($partners as $p) {
    $link = $p->link ?? 'NULL';
    echo "<tr><td>{$p->id}</td><td>{$p->title}</td><td>{$link}</td><td>{$p->image}</td></tr>";
}
echo "</table>";

echo "<h2 style='color:green;'>Done! Delete this file now.</h2>";
