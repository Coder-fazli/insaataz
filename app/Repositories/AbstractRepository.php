<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

abstract class AbstractRepository
{
    protected $modelClass;

    public function __construct()
    {
        if (!$this->modelClass) {
            throw new \Error("model class not defined");
        }
    }

    public function getLatest()
    {
        return $this->query()
            ->orderByDesc('id')
            ->first();
    }


    public function get($id, $with = [])
    {
        return $this->modelClass::with($with)->find($id);
    }


    public function all($with = [])
    {
        return $this
            ->query()
            ->with($with)
            ->get();
    }

    public function paginate($count = 8, $with = [])
    {
        return $this->query()->with($with)->paginate($count);
    }

    public function query()
    {
        return $this->modelClass::query();
    }
}
