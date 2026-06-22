<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutFeatureCard extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'about_feature_cards';
    protected $guarded = [];
    public $translatable = [
        'title',
        'description',
    ];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];
}
