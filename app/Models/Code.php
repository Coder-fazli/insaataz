<?php

namespace App\Models;

use App\Utils\HashGenerator;
use Exception;
use Webmozart\Assert\Assert;

class Code
{

    private string $value;

    public function __construct(string $code)
    {
        Assert::regex($code, '/^[A-Z0-9]{8}$/', 'Invalid code format');

        $this->value = $code;
    }

    /**
     * @throws Exception
     */
    public static function createRandom(): self
    {
        return new self(HashGenerator::generate());
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    public function withPrefix(): string
    {
        return '#' . $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

}
