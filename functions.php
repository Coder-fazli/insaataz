<?php

use Illuminate\Support\Facades\Storage;


if (!function_exists('get_image')) {
    function get_image($filePath, ?string $size = null): string
    {
        if (empty($filePath)) {
            return asset('images/thunk.svg');
        }

        $name = substr($filePath, strrpos($filePath, '/') + 1);

        $folderNames = Str::replace($name, '', $filePath);


        if ($size != null) {
            $sizes = config('imageSizes.template');
            $storage = Storage::disk('public');
            $path = $storage->path($folderNames . $size . '/');
            $original = storage_path('app/public/' . $filePath);
            if (!is_file($original)) {
                return asset('images/thunk.svg');
            }
            if (!is_file($path . $name)) {
                try {
                    if (!is_dir($path)) {
                        $storage->makeDirectory($folderNames . $size);
                    }
                    \Intervention\Image\Facades\Image::make($original)
                        ->resize($sizes[$size]['w'], $sizes[$size]['h'], function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($path . $name);
                } catch (\Exception $exception) {
                    return asset('images/thunk.svg');
                }
            }
        }
        return asset("storage/{$folderNames}" . ($size == null ? '' : $size . '/') . $name);
    }


}

if (!function_exists('get_imageAspect')) {
    function get_imageAspect($filePath, ?string $size = null): string
    {
        if (empty($filePath)) {
            return asset('images/thunk.svg');
        }

        $name = substr($filePath, strrpos($filePath, '/') + 1);

        $folderNames = Str::replace($name, '', $filePath);


        if ($size != null) {
            $sizes = config('imageSizes.template');
            $storage = Storage::disk('public');
            $path = $storage->path($folderNames . $size . '/');
            $original = storage_path('app/public/' . $filePath);
            if (!is_file($original)) {
                return asset('images/thunk.svg');
            }
            if (!is_file($path . $name)) {
                try {
                    if (!is_dir($path)) {
                        $storage->makeDirectory($folderNames . $size);
                    }
                    \Intervention\Image\Facades\Image::make($original)
                        ->resize($sizes[$size]['w'], $sizes[$size]['h'],

                            function ($constraint) {
                                $constraint->aspectRatio();
                            }

                        )
                        ->save($path . $name);
                } catch (\Exception $exception) {
                    return asset('images/thunk.svg');
                }
            }
        }
        return asset("storage/{$folderNames}" . ($size == null ? '' : $size . '/') . $name);
    }
    if (!function_exists('getParsedDate')) {
        function getParsedDate($date, string $format = ' d F Y'): string
        {
            if (is_a($date, Carbon::class)) {
                return $date->translatedFormat($format);
            }
            return Carbon::parse($date)->translatedFormat($format);
        }
    }
}

if (!function_exists('calculate_discount')) {
    function calculate_discount(\App\Models\Product $product)
    {
        $discountPrice = $product->discount_price;
        $price = $product->price;
        $discount=($price-$discountPrice)/$price*100;
        $discount=round($discount,2);
        if ($discount>=1){
            return $discount;
        }
      return null;
    }


}
if (!function_exists('currency_index')) {
    function currency_index()
    {
      return '&#8380';
    }
}
