<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\Status;

class FavoriteProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function getFavoriteProductsWithPhotos($clientID)
    {
        $favoriteProducts = FavoriteProduct::where('client_id', $clientID)->get();
        $productIDs = $favoriteProducts->pluck('product_id')->toArray();
        $products = Product::whereIn('products.id', $productIDs)
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

        // Şimdi $products içinde belirli bir kullanıcının favori ürünlerine ait ürün bilgileri bulunuyor
        return $products;
    }
}