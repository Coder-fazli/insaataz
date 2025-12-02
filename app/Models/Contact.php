<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'contacts';
    protected $guarded = [];
    public $translatable = [
        'address',
    ];
    protected $casts = [
        'address' => 'array',
    ];
}
