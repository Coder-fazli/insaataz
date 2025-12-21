<?php
// Run this file once by visiting: https://orelinsaat.az/update-partners.php
// DELETE THIS FILE AFTER RUNNING!

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "<h2>Updating Partner Links...</h2>";

// Step 1: Add 'link' column if it doesn't exist
if (!Schema::hasColumn('partners', 'link')) {
    Schema::table('partners', function ($table) {
        $table->string('link', 500)->nullable()->after('slug');
    });
    echo "<p>✅ Added 'link' column to partners table</p>";
} else {
    echo "<p>✅ 'link' column already exists</p>";
}

// Step 2: Update partner links
$updates = [
    'apamet-boyler' => 'https://www.apamet.com.tr/',
    'giacomini' => 'https://www.giacomini.com/',
    'sira-industrie' => 'https://www.siraindustrie.com/en-gb/',
    'general-fittings' => 'https://www.generalfittings.it/en',
    'ets-vana' => 'https://www.etsvana.com.tr/',
];

foreach ($updates as $slug => $link) {
    $affected = DB::table('partners')
        ->where('slug', $slug)
        ->update(['link' => $link]);

    if ($affected > 0) {
        echo "<p>✅ Updated: {$slug} → {$link}</p>";
    } else {
        echo "<p>⚠️ Not found: {$slug}</p>";
    }
}

// Step 3: Show all partners
echo "<h3>All Partners:</h3>";
$partners = DB::table('partners')->get();
echo "<table border='1' cellpadding='10'><tr><th>ID</th><th>Title</th><th>Slug</th><th>Link</th></tr>";
foreach ($partners as $p) {
    $link = $p->link ?? 'NULL';
    echo "<tr><td>{$p->id}</td><td>{$p->title}</td><td>{$p->slug}</td><td>{$link}</td></tr>";
}
echo "</table>";

echo "<h2 style='color:green;'>✅ DONE! Now delete this file from server!</h2>";
echo "<p><strong>Delete:</strong> public/update-partners.php</p>";
