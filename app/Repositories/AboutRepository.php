<?php

namespace App\Repositories;

use App\Models\About;

class AboutRepository extends AbstractRepository
{
    protected $modelClass = About::class;

    public function first()
    {
        return $this->modelClass::first();
    }
}