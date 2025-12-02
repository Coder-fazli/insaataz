<?php

namespace App\Models;

use Spatie\TranslationLoader\LanguageLine;

class Translate extends LanguageLine
{
    protected $table = 'language_lines';

    protected $casts = [
        'text' => 'array'
    ];
}
