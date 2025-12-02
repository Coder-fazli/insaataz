<?php

namespace Database\Seeders;

use App\Enum\Status;
use App\Models\Category;
use App\Models\Code;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductPhotos;
use Faker\Provider\Text;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $cIds = Category::query()->where(['status' => Status::ACTIVE])->whereNotNull('parent_id')->pluck('id')->toArray();

        for ($i = 0; $i <= 80; $i++) {
            $product = Product::query()->orderByDesc('id')->first()->toArray();
            $productFeatures = ProductFeature::query()->where('product_id', $product['id'])->get()->toArray();
            $productPhotos = ProductPhotos::query()->where('product_id', $product['id'])->get()->toArray();
            $newProductID = $product['id'] + 1;
            unset($product['id']);
            $newSlug = 'product--' . $newProductID;
            $product['id'] = $newProductID;
            $product['slug'] = ['az' => $newSlug];
            $product['is_best_seller'] = rand(0, 1);
            $product['is_chosen'] = rand(0, 1);
            $product['stock'] = rand(1, 20);
            $product['code'] = Code::createRandom();
            $product['category_id'] = $cIds[rand(0, count($cIds) - 1)];
            $product['price'] = rand(300,499);
            $product['discount_price'] = rand(200,399);
            try {
                $product = Product::create($product);
            } catch (\Exception $exception) {

            }
            foreach ($productFeatures as $feature) {
                unset($feature['id']);
                $feature['product_id'] = $newProductID;
                try {
                    ProductFeature::create($feature);
                } catch (\Exception $exception) {
                    dd($exception->getMessage());
                }

            }
            foreach ($productPhotos as $photo) {
                unset($photo['id']);
                $photo['product_id'] = $newProductID;
                try {
                    ProductPhotos::create($photo);
                } catch (\Exception $exception) {
                    dd($exception->getMessage());
                }
            }
            $i++;
        }

    }
}
