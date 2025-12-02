<?php

namespace App\Repositories;

use App\Enum\Status;
use App\Models\Slider;

class SliderRepository extends AbstractRepository
{
    protected $modelClass = Slider::class;

    public function query()
    {
        return Slider::query()->where('status', Status::ACTIVE);
    }

    public function getByType($type, $with = [])
    {
        return $this
            ->query()
            ->where('type', $type)
            ->with($with)
            ->get();
    }

    public function first()
    {

        return $this->thisQuery()->orderByDesc('id')->first();

    }

    public function getActives()
    {

        return $this->query()->orderByDesc('id')->get();

    }
}
