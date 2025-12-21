<?php
// Script to add 5 new partner logos to database

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Partner;

echo "Adding new partners to database...\n\n";

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

foreach ($newPartners as $partnerData) {
    // Check if partner already exists
    $existing = Partner::where('title', $partnerData['title'])->first();

    if ($existing) {
        echo "⚠️  Partner '{$partnerData['title']}' already exists. Skipping...\n";
        continue;
    }

    // Create new partner
    $partner = Partner::create($partnerData);
    echo "✅ Added: {$partner->title} (ID: {$partner->id})\n";
}

echo "\n✅ Done! Check your website partners slider.\n";
