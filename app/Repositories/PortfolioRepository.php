<?php

namespace App\Repositories;

use App\Models\Portfolio;
use App\Models\Services;

class PortfolioRepository
{
    public function get($id)
    {
        return Portfolio::find($id);
    }

    public function all()
    {
        return $this
            ->query()
            ->get();
    }

    public function paginate($count = 8)
    {
        return $this->query()->paginate($count);
    }

    public function query()
    {
        return Portfolio::query();
    }
    public function getBySlug($slug)
    {
        $slug_field='slug->'.app()->getLocale();
        return $this->query()->where($slug_field,$slug)->firstOrFail();
    }
}
