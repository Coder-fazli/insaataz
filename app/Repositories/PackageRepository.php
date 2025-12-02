<?php

namespace App\Repositories;


use App\Models\Package;


class PackageRepository extends AbstractRepository
{
    protected $modelClass = Package::class;

    public function getActive()
    {
        return $this->thisQuery()->withDepth()->defaultOrder()->get();
    }

    public function getWithPackages()
    {
        return $this->query()->with(['packages:id,title'])->paginate();
    }

    public function getBySlug($slug, $with = [])
    {
        $lang = app()->getLocale();
        return $this->query()->with($with)->where("slug->{$lang}", $slug)->firstOrFail();
    }

}
