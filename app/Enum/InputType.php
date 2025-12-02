<?php
declare(strict_types=1);

namespace App\Enum;

class InputType
{
    const TEXT = 0;
    const SELECT = 1;


    public static function getList(): array
    {
        return [
            self::TEXT => 'TEXT',
            self::SELECT => 'SELECT',
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
