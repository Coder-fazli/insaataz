<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class AttributeGroup extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'attribute_group';
    public $timestamps = false;
    protected $guarded = [];
    public $translatable = [
        'title'
    ];
    protected $casts = [
        'title' => 'array',
    ];

    public function attributes()
    {
        return $this->hasMany(Attribute::class,'group_id');
    }
}
