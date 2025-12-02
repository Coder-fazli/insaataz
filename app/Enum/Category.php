<?php
declare(strict_types=1);

namespace App\Enum;

class Category
{
    const TIKTOK = 0;
    const YOUTUBE = 1;

    public static function getList(): array
    {
        return [
            self::TIKTOK => __('site.tiktok'),
            self::YOUTUBE => __('site.youtube'),

        ];
    }

    public static function get(string $size): string
    {
        if (array_key_exists($size, self::getList())) {
            return self::getList()[$size];
        }

        return '';
    }
}
