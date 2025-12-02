<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use App\Enum\Status;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $guarded = [];
    protected $translatable = ['title', 'desc', 'slug'];
    protected $casts = [
        'title' => 'array',
        'desc' => 'array',
        'slug' => 'array',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhotos::class, 'product_id');
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class, 'product_id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductFilter::class, 'product_id');
    }

    public function productAttributes(){
        return true;
    }

//    public function isFavorite($clientID) {
//        // Kullanıcının favorilerinde bu ürün var mı kontrol et
//        return FavoriteProduct::where('product_id', $this->id)
//                              ->where('client_id', $clientID)
//                              ->exists();
//    }

    public function isFavorite($clientID) {
        $cacheKey = "favorite_product_{$this->id}_client_{$clientID}";
        return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($clientID) {
            return FavoriteProduct::where('product_id', $this->id)
                ->where('client_id', $clientID)
                ->exists();
        });
    }


    public function isCompare($productId) {
        if (request()->cookie('product_ids')) {
            $productIdsCookie = json_decode(request()->cookie('product_ids'), true);

            if ($productIdsCookie && in_array($productId, $productIdsCookie)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getCompareProductsWithPhotos($productIdsCookie) {
        $products = Product::whereIn('products.id', $productIdsCookie)
                            ->leftJoin('product_photos as pf', function ($j) {
                                $j->on('pf.product_id', '=', 'products.id');
                                $j->where('pf.is_front', true);
                            })
                            ->leftJoin('product_photos as pp', function ($j) {
                                $j->on('pp.product_id', '=', 'products.id');
                                $j->where('pp.is_back', true);
                            })
                            ->where('products.status', Status::ACTIVE)
                            ->select('products.*', 'pf.image as front_image', 'pp.image as back_image');

        return $products;
    }
//    public function frontImage()
//    {
//        if ($pr = $this->photos()->where('is_front', true)->first()) {
//            return $pr->image;
//        } else {
//            return null;
//        }
//
//    }
//
//    public function backImage()
//    {
//        if ($pr = $this->photos()->where('is_back', true)->first()) {
//            return $pr->image;
//        } else {
//            return $this->frontImage();
//        }
//
//    }

    public function getFrontImageAttribute()
    {
        return data_get($this->attributes,'front_image',null);
    }

    public function getBackImageAttribute()
    {
        return data_get($this->attributes,'back_image',$this->front_image);
    }


    public function product_shema_images() {
         return $this->hasMany(ProductShemaImage::class, 'product_id');
    }

}
