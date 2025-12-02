<?php

namespace App\Repositories;

use App\Enum\Status;
use App\Models\Category;
use App\Models\Product;
use App\Models\FavoriteProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;

class ProductRepository
{
    private $query;

public function __construct()
{
    $this->query = $this->query()

        ->orderByRaw("
            CASE
                WHEN LOWER(title) LIKE '%boru%' THEN 1
                WHEN LOWER(title) LIKE '%antea%' THEN 2
                WHEN LOWER(title) LIKE '%lambert%' THEN 3
                WHEN LOWER(title) LIKE '%victoria%' THEN 4
                WHEN LOWER(title) LIKE '%minorca%' THEN 5
                WHEN LOWER(title) LIKE '%formentera%' THEN 6
                WHEN LOWER(title) LIKE '%calista%' THEN 7
                WHEN LOWER(title) LIKE '%terra%' THEN 8
                WHEN LOWER(title) LIKE '%seneks%' THEN 9
                ELSE 10
            END ASC,
            CASE
                WHEN LOWER(title) LIKE '%boru%' THEN `order`
                WHEN LOWER(title) LIKE '%antea%' THEN `order`
                WHEN LOWER(title) LIKE '%lambert%' THEN `order`
                WHEN LOWER(title) LIKE '%victoria%' THEN `order`
                WHEN LOWER(title) LIKE '%minorca%' THEN `order`
                WHEN LOWER(title) LIKE '%formentera%' THEN `order`
                WHEN LOWER(title) LIKE '%calista%' THEN `order`
                WHEN LOWER(title) LIKE '%terra%' THEN `order`
                WHEN LOWER(title) LIKE '%seneks%' THEN `order`
                ELSE `order`
            END DESC
        ");
}




    public function get($id, $with = [])
    {
        return $this->query()->with($with)->findOrFail($id);
    }

    public function all($limit = 15)
    {
        return $this
            ->query()
            ->limit($limit)
            ->get();
    }

    public function getChosen($limit = 12, $with = [], $random = false)
    {
        $query = $this
            ->query()
            ->with($with)
            // ->where(['is_chosen' => Status::ACTIVE, 'is_best_seller' => Status::INACTIVE]);
            ->where('is_chosen', Status::ACTIVE);
        if ($random) {
            $query->inRandomOrder();
        } else {
        }
        $query->limit($limit);
        return $this;
    }


    public function getBestSeller($limit = 12, $with = [], $random = false)
    {
        $query = $this
            ->query()


            ->with($with)
            // ->where(['is_chosen' => Status::INACTIVE, 'is_best_seller' => Status::ACTIVE]);
            ->where('is_best_seller', Status::ACTIVE);
        if ($random) {
            $query->inRandomOrder();
        } else {
        }
        $query->limit($limit);
        return $this;

    }

    public function getLatest($limit = 12, $with = [], $random = false)
    {
        $query = $this
            ->query()


            ->with($with);
        if ($random) {
            $query->inRandomOrder();
        } else {
        }
        $query->limit($limit)->orderByDesc('id');
        return $this;

    }

    public function getDiscountedProducts($limit = 12, $with = [], $random = false){
        $query = $this
            ->query()


            ->with($with)
            ->whereNotNull('discount_price')
            ->where('discount_price', '!=', 0);
        if ($random) {
            $query->inRandomOrder();
        } else {
        }
        $query->limit($limit);
        return $this;
    }

    public function getMinPriceWhereInCat($categoryIds)
    {
        return number_format(floatval($this->query
            ->whereIn('category_id', $categoryIds)
            ->min('price')), 2, '.', '');
    }

    public function getMaxPriceWhereInCat($categoryIds)
    {
        return number_format(floatval($this->query
            ->whereIn('category_id', $categoryIds)
            ->max('price')), 2, '.', '');
    }

    public function getRelatedByCategory($categoryId, $limit = 12, $with = [],$random = true)
    {
        $query = $this
            ->query()


            ->with($with)
            ->where(['category_id' => $categoryId]);
        if ($random) {
            $query->inRandomOrder();
        } else {
        }
        $query->limit($limit);
        return $this;


        // return $this
        //     ->query()
        //     ->with($with)
        //     ->where(['is_best_seller' => Status::ACTIVE, 'category_id' => $categoryId])
        //     ->limit($limit)
        //     ->get();
    }

    public function paginate($count = 8)
    {
        return $this->query()->paginate($count);
    }

    public function query()
    {
        $this->query = Product::query()->where('status', Status::ACTIVE);
        return $this->query;
    }

    public function getBySlug($slug, $with = [])
    {
        $field = 'slug->' . app()->getLocale();
        return $this->query()->where($field, $slug)->with($with)->first();
    }

    public function getByIds($ids, $with = [])
    {
        $this->query();
        $this->query
            ->whereIn('products.id', $ids)
            ->with($with);
        return $this;
    }

    public function getByCategoryIds($ids, $with = [])
    {
        $this->query
            ->whereIn('category_id', $ids)
            ->with($with);
        return $this;
    }

    public function joinPhoto()
    {
        return $this->query->select(['products.*', 'pf.image as front_image', 'pp.image as back_image'])
            ->leftJoin('product_photos as pf', function ($j) {
                $j->on('pf.product_id', '=', 'products.id');
                $j->where('is_front', true);
            })
            ->leftJoin('product_photos as pp', function ($j) {
                $j->on('pp.product_id', '=', 'products.id');
                $j->where('pp.is_back', true);
            });
    }

    public function getProductsFromCart()
    {
        $cartProducts = Cart::content();
//        dd($cartProducts,7);
        if ($cartProducts) {
            $productIds = $cartProducts->pluck('id');
        } else {
            $productIds = [];
        }
//        dd($productIds);
        $products = $this->getByIds($productIds)->joinPhoto()->get();
//        dd($products);
        $products = $this->custom_array_merge($products, $cartProducts);
        return $products;
    }

    function custom_array_merge(&$products, &$cartProducts)
    {
        foreach ($cartProducts as $key_1 => &$cartProduct) {
            foreach ($products as $key_1 => $product) {
                if ($cartProduct->id == $product->id) {
                    if ($cartProduct->qty >= $product->stock) {
                        $product['qty'] = $product->stock;
                    } else {
                        $product['qty'] = $cartProduct->qty;
                    }

                    $product['rowId'] = $cartProduct->rowId;
                    $product['total'] = $this->calculatePrice((int)$product['qty'], $product);
                }
            }
        }
        return $products;
    }

    public function calculatePrice(int $qty, Product $product)
    {
        if (!$qty)
            $qty = 1;

        if ($product->discount_price && $product->discount_price > 0) {
            $price = $product->discount_price;
        } else {
            $price = $product->price;
        }
        return $qty * $price;
    }
}
