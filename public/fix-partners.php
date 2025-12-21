<?php
// Run this file once by visiting: https://orelinsaat.az/fix-partners.php
// DELETE THIS FILE AFTER RUNNING!

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h2>Fixing Partner Links...</h2>";

// Copy slug (which contains URLs) to link field for all partners
$partners = DB::table('partners')->get();

foreach ($partners as $partner) {
    // If slug looks like a URL, copy it to link
    if (!empty($partner->slug) && (str_starts_with($partner->slug, 'http://') || str_starts_with($partner->slug, 'https://'))) {
        DB::table('partners')
            ->where('id', $partner->id)
            ->update(['link' => $partner->slug]);
        echo "<p>✅ ID {$partner->id}: Copied '{$partner->slug}' to link</p>";
    }
}

// Show updated partners
echo "<h3>Updated Partners:</h3>";
$partners = DB::table('partners')->get();
echo "<table border='1' cellpadding='10'><tr><th>ID</th><th>Title</th><th>Slug</th><th>Link</th><th>Image</th></tr>";
foreach ($partners as $p) {
    $link = $p->link ?? 'NULL';
    echo "<tr><td>{$p->id}</td><td>{$p->title}</td><td>{$p->slug}</td><td>{$link}</td><td>{$p->image}</td></tr>";
}
echo "</table>";

echo "<h2 style='color:green;'>✅ DONE! Now delete this file!</h2>";
