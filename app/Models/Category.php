<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, NodeTrait;

    protected $guarded = [];
    protected $translatable = ['title', 'desc', 'slug'];
    protected $casts = [
        'title' => 'array',
        'desc' => 'array',
        'slug' => 'array',
    ];


    public function category()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
//    public function children()
//    {
//        return $this->hasMany(self::class,'parent_id','id');
//    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function attributesGroup()
    {
        return $this->belongsToMany(AttributeGroup::class, 'category_attributes', 'category_id', 'group_id');
    }


    public function productsWithImage($catIds)
    {
        return $this->hasMany(Product::class, 'category_id')->select(['products.*', 'pf.image as front_image', 'pp.image as back_image'])
            ->leftJoin('product_photos as pf', function ($j) {
                $j->on('pf.product_id', '=', 'products.id');
                $j->where('is_front', true);
            })
            ->leftJoin('product_photos as pp', function ($j) {
                $j->on('pp.product_id', '=', 'products.id');
                $j->where('pp.is_back', true);
            });

    }
    public function getChildren() {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('order', 'asc');
    }
}
