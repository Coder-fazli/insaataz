<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class OrderItems extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'order_items';

    public function order()
    {

    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')
            ->select(['products.*', 'pf.image as front_image', 'pp.image as back_image'])
            ->leftJoin('product_photos as pf', function ($j) {
                $j->on('pf.product_id', '=', 'products.id');
                $j->where('pf.is_front', true);
            })
            ->leftJoin('product_photos as pp', function ($j) {
                $j->on('pp.product_id', '=', 'products.id');
                $j->where('pp.is_back', true);
            });
    }
}
