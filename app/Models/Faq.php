<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $translatable = ['title', 'desc'];
    protected $casts = [
        'title' => 'array',
        'desc' => 'array',
    ];
    protected $table='faq';

}
