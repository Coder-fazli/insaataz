<?php

namespace App\Repositories;

use App\Models\Gallery;

class GalleryRepository extends AbstractRepository
{
    protected $modelClass = Gallery::class;

    public function galleryImages($page = 8)
    {
        return $this->query()->where('is_history', false)->paginate($page);
    }

    public function historyImages($page = 8)
    {
        return $this->query()->where('is_history', true)->paginate($page);
    }
}
