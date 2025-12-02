<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Settings extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'settings';
    protected $guarded = [];
    public $translatable = [
        'address'
    ];
    protected $casts = [
        'address' => 'array',
        'phone' => 'array',
        'email' => 'array',
    ];
    
}
