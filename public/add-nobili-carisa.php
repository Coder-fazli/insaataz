<?php
// Visit: https://orelinsaat.az/add-nobili-carisa.php
// DELETE THIS FILE AFTER RUNNING!

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "<h2>Adding Nobili and Carisa Partners...</h2>";

// Ensure link column exists
if (!Schema::hasColumn('partners', 'link')) {
    Schema::table('partners', function ($table) {
        $table->string('link', 500)->nullable()->after('slug');
    });
    echo "<p>✅ Added 'link' column</p>";
}

// Add Nobili
$exists = DB::table('partners')->where('title', 'Nobili')->exists();
if (!$exists) {
    DB::table('partners')->insert([
        'title' => 'Nobili',
        'image' => 'partners/nobili-logo.jpg',
        'slug' => 'nobili',
        'link' => 'https://www.nobili.it/en/',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    echo "<p>✅ Added Nobili partner</p>";
} else {
    echo "<p>⚠️ Nobili already exists</p>";
}

// Add Carisa
$exists = DB::table('partners')->where('title', 'Carisa')->exists();
if (!$exists) {
    DB::table('partners')->insert([
        'title' => 'Carisa',
        'image' => 'partners/carisa-logo.png',
        'slug' => 'carisa',
        'link' => 'https://carisa.com.tr/en/',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    echo "<p>✅ Added Carisa partner</p>";
} else {
    echo "<p>⚠️ Carisa already exists</p>";
}

// Show all partners
echo "<h3>All Partners:</h3>";
$partners = DB::table('partners')->get();
echo "<table border='1' cellpadding='10'><tr><th>ID</th><th>Title</th><th>Link</th><th>Image</th></tr>";
foreach ($partners as $p) {
    echo "<tr><td>{$p->id}</td><td>{$p->title}</td><td>{$p->link}</td><td>{$p->image}</td></tr>";
}
echo "</table>";

echo "<h2 style='color:green;'>✅ DONE! Delete this file now!</h2>";
