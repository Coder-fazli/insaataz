<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Services extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'services';
    protected $guarded = [];
    public $translatable = [
        'title',
        'slug',
        'sub_title',
        'description',
        'banner_title',
        'banner_subtitle',
    ];
    protected $casts = [
        'title' => 'array',
        'slug'=>'array',
        'sub_title' => 'array',
        'description' => 'array',
        'banner_title' => 'array',
        'banner_subtitle' => 'array',

    ];

//    public function instructor()
//    {
//        return $this->belongsTo(Instructor::class, 'instructor_id');
//    }
}
