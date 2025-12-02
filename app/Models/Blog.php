<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'blogs';
    protected $guarded = [];
    public $translatable = [
        'title',
        'description'
    ];
    protected $casts = [
        'title'       => 'array',
        'description' => 'array'
    ];

    public function photos()
    {
        return $this->hasMany(BlogPhotos::class, 'blog_id');
    }

}
