<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translations extends Model
{
    use HasFactory;

    protected $table = 'language_lines';
    protected $guarded = [];
    public $translatable = [
        'text',
    ];
    protected $casts = [
        'text'    =>  'array'
    ];

}
