<?php
// Тестовый файл для проверки партнеров

// Подключаем autoload
require __DIR__ . '/vendor/autoload.php';

// Загружаем Laravel app
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Получаем партнеров
$partners = \App\Models\Partner::all();

echo "Количество партнеров: " . $partners->count() . "\n\n";

foreach ($partners as $partner) {
    echo "ID: {$partner->id}\n";
    echo "Title: {$partner->title}\n";
    echo "Image: {$partner->image}\n";
    echo "Image path: storage/{$partner->image}\n";
    echo "Full URL: " . asset("storage/{$partner->image}") . "\n";
    echo "File exists: " . (file_exists(public_path("storage/{$partner->image}")) ? 'YES' : 'NO') . "\n";
    echo "---\n";
}
