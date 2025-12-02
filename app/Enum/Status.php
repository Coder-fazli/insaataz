<?php
declare(strict_types=1);

namespace App\Enum;

class Status
{
    const ACTIVE = true;
    const INACTIVE = false;
     
    public static function getList(): array
    {
        return [
            self::INACTIVE => trans('admin.status.deactivated'),
            self::ACTIVE => trans('admin.status.activated')
        ];
    }

    public static function get(int $status): string
    {
        if (array_key_exists($status, self::getList())) {
            return self::getList()[$status];
        }
        return '';
    }
}
