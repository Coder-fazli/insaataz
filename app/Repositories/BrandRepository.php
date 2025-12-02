<?php

namespace App\Repositories;

use App\Enum\Status;
use App\Models\Brand;
use App\Models\Category;

class BrandRepository
{
    public function get($id,$with=[])
    {
        return Brand::with($with)->find($id);
    }

    public function all()
    {
        return $this
            ->query()
            ->get();
    }




    public function query()
    {
        return Brand::query()->where('status', Status::ACTIVE);
    }


}
