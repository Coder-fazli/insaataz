<?php
// Run this file once by visiting: https://orelinsaat.az/add-5-partners.php
// DELETE THIS FILE AFTER RUNNING!

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h2>Adding 5 New Partners...</h2>";

$newPartners = [
    [
        'title' => 'Apamet Boyler',
        'image' => 'partners/apamet-logo.webp',
        'slug' => 'apamet-boyler',
        'link' => 'https://www.apamet.com.tr/',
    ],
    [
        'title' => 'Giacomini',
        'image' => 'partners/giacomini-logo.png',
        'slug' => 'giacomini',
        'link' => 'https://www.giacomini.com/',
    ],
    [
        'title' => 'SIRA Industrie',
        'image' => 'partners/sira-industrie-logo.png',
        'slug' => 'sira-industrie',
        'link' => 'https://www.siraindustrie.com/en-gb/',
    ],
    [
        'title' => 'General Fittings',
        'image' => 'partners/general-fittings-logo.jpg',
        'slug' => 'general-fittings',
        'link' => 'https://www.generalfittings.it/en',
    ],
    [
        'title' => 'ETS VANA',
        'image' => 'partners/ets-vana-logo.jpg',
        'slug' => 'ets-vana',
        'link' => 'https://www.etsvana.com.tr/',
    ],
];

foreach ($newPartners as $partner) {
    // Check if already exists
    $exists = DB::table('partners')->where('link', $partner['link'])->first();

    if ($exists) {
        echo "<p>⚠️ Already exists: {$partner['title']}</p>";
    } else {
        DB::table('partners')->insert([
            'title' => $partner['title'],
            'image' => $partner['image'],
            'slug' => $partner['slug'],
            'link' => $partner['link'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        echo "<p>✅ Added: {$partner['title']} → {$partner['link']}</p>";
    }
}

// Show all partners
echo "<h3>All Partners:</h3>";
$partners = DB::table('partners')->get();
echo "<table border='1' cellpadding='10'><tr><th>ID</th><th>Title</th><th>Link</th><th>Image</th></tr>";
foreach ($partners as $p) {
    $link = $p->link ?? 'NULL';
    echo "<tr><td>{$p->id}</td><td>{$p->title}</td><td>{$link}</td><td>{$p->image}</td></tr>";
}
echo "</table>";

echo "<h2 style='color:green;'>✅ DONE! Delete this file now!</h2>";
