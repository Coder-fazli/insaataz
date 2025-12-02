<?php

namespace App\Repositories;

use App\Enum\Status;
use App\Models\Category;

class CategoryRepository
{
    public function get($id,$with=[])
    {
        return Category::with($with)->find($id);
    }

public function all()
    {
        return $this
            ->query()
            ->orderByRaw('CAST(`order` AS UNSIGNED)')
            ->get();
    }

    public function getParents($with = [])
    {
        return $this
            ->query()
            ->with($with)
            ->orderBy('order')
            ->whereNull('parent_id')
            ->get();
    }

    public function paginate($count = 8)
    {
        return $this->query()->paginate($count);
    }

    public function query()
    {
        return Category::query()->where('status', Status::ACTIVE);
    }

    public function getBySlug($slug, $with = [])
    {
        $field='slug->'.app()->getLocale();
        return $this->query()->where($field,$slug)->with($with)->firstOrFail();
    }


   
}
