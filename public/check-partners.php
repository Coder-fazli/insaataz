<?php
// Check current partners status
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

echo "<h2>Current Partners in Database:</h2>";

$partners = DB::table('partners')->get();

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Title</th><th>Slug</th><th>Link</th><th>Image Path</th><th>Image Exists?</th><th>Preview</th></tr>";

foreach ($partners as $p) {
    $link = $p->link ?? 'NULL';
    $imagePath = storage_path('app/public/' . $p->image);
    $exists = file_exists($imagePath) ? '✅ YES' : '❌ NO';
    $preview = file_exists($imagePath) ? "<img src='/storage/{$p->image}' width='80'>" : 'N/A';

    echo "<tr>";
    echo "<td>{$p->id}</td>";
    echo "<td>{$p->title}</td>";
    echo "<td>{$p->slug}</td>";
    echo "<td>{$link}</td>";
    echo "<td>{$p->image}</td>";
    echo "<td>{$exists}</td>";
    echo "<td>{$preview}</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h3>Total partners: " . count($partners) . "</h3>";

// List files in partners folder
echo "<h2>Files in storage/partners folder:</h2>";
$partnerFiles = glob(storage_path('app/public/partners/*'));
echo "<ul>";
foreach ($partnerFiles as $file) {
    $filename = basename($file);
    echo "<li>{$filename}</li>";
}
echo "</ul>";
echo "<p>Total files: " . count($partnerFiles) . "</p>";
