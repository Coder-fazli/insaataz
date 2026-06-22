<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'about';
    protected $guarded = [];
    public $translatable = [
        'title',
        'description',
        'hero_badge',
        'hero_title',
        'hero_title_highlight',
        'hero_description',
        'whyus_badge',
        'whyus_title',
        'whyus_title_highlight',
        'whyus_lead',
        'guarantee_title',
        'guarantee_subtitle',
    ];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'hero_badge' => 'array',
        'hero_title' => 'array',
        'hero_title_highlight' => 'array',
        'hero_description' => 'array',
        'whyus_badge' => 'array',
        'whyus_title' => 'array',
        'whyus_title_highlight' => 'array',
        'whyus_lead' => 'array',
        'guarantee_title' => 'array',
        'guarantee_subtitle' => 'array',
    ];
}
