<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helper
{
    public static function i($name, $disk = 'public'): string
    {
        return Storage::disk($disk)->url($name);
    }

    public static function arraySlug($translatable)
    {
        $slug = [];
        foreach ($translatable as $key => $translation) {
            $slug[$key] = \Str::slug($translation);
        }
        return $slug;
    }

    public static function hasFile($image)
    {
        return strlen(Str::replace(env('APP_URL').'/storage/','',$image));
    }
}
