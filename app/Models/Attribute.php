<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Attribute extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'attributes';
    public $timestamps = false;
    protected $guarded = [];
    public $translatable = [
        'title'
    ];
    protected $casts = [
        'title' => 'array',
    ];


    public function group()
    {
        return $this->belongsTo(AttributeGroup::class, 'group_id');
    }
}
