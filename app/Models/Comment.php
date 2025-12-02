<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='comments';
    protected $guarded=[];
    public $translatable = [
        'title',  'subtitle',  'description',
    ];
    protected $casts = [
        'title'    =>  'array',
        'subtitle'    =>  'array',
        'description'    =>  'array'
    ];

}
