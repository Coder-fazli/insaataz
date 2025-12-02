<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class AttributeGroupCategory extends Model
{
    use HasFactory;

    protected $table = 'category_attributes';
    public $timestamps = false;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function group()
    {
        return $this->belongsTo(Category::class, 'group_id');
    }
}
