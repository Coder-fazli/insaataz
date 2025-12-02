<?php

namespace App\Utils;

use Exception;

final class HashGenerator
{

    /**
     * @throws Exception
     */
    public static function generate(): string
    {
        return strtoupper(bin2hex(random_bytes(4)));
    }

}
