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
    ];
    protected $casts = [
        'title' => 'array',
        'description' => 'array'
    ];

}
