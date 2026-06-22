<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutStatCard extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'about_stat_cards';
    protected $guarded = [];
    public $translatable = [
        'label',
    ];
    protected $casts = [
        'label' => 'array',
    ];
}
