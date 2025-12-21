<?php
// Update links for the 5 partners based on image/title
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "<h2>Updating 5 Partner Links...</h2>";

// Find and update by title or image containing these keywords
$updates = [
    ['search' => 'apamet', 'link' => 'https://www.apamet.com.tr/'],
    ['search' => 'giacomini', 'link' => 'https://www.giacomini.com/'],
    ['search' => 'sira', 'link' => 'https://www.siraindustrie.com/en-gb/'],
    ['search' => 'general', 'link' => 'https://www.generalfittings.it/en'],
    ['search' => 'ets', 'link' => 'https://www.etsvana.com.tr/'],
];

foreach ($updates as $u) {
    $affected = DB::table('partners')
        ->where(function($query) use ($u) {
            $query->where('title', 'LIKE', '%' . $u['search'] . '%')
                  ->orWhere('image', 'LIKE', '%' . $u['search'] . '%')
                  ->orWhere('slug', 'LIKE', '%' . $u['search'] . '%');
        })
        ->update(['link' => $u['link']]);

    if ($affected > 0) {
        echo "<p>✅ Updated {$affected} partner(s) matching '{$u['search']}' → {$u['link']}</p>";
    } else {
        echo "<p>⚠️ No partner found matching '{$u['search']}'</p>";
    }
}

// Show all partners with their links
echo "<h3>All Partners Now:</h3>";
$partners = DB::table('partners')->get();
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Title</th><th>Slug</th><th>Link</th><th>Image</th></tr>";
foreach ($partners as $p) {
    $link = $p->link ?? 'NULL';
    $hasLink = !empty($p->link) ? '✅' : '❌';
    echo "<tr><td>{$p->id}</td><td>{$p->title}</td><td>{$p->slug}</td><td>{$hasLink} {$link}</td><td>{$p->image}</td></tr>";
}
echo "</table>";

echo "<h2 style='color:green;'>Done! Delete this file now.</h2>";
