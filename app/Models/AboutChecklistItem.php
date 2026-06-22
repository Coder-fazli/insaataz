<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutChecklistItem extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'about_checklist_items';
    protected $guarded = [];
    public $translatable = [
        'text',
    ];
    protected $casts = [
        'text' => 'array',
    ];
}
