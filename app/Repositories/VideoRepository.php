<?php

namespace App\Repositories;

use App\Enum\Category;
use App\Models\KarnegiVideo;

class VideoRepository extends AbstractRepository
{
    protected $modelClass = KarnegiVideo::class;

    public function getYoutubeVideos($page = 6)
    {
        return $this->query()->where('category_id', Category::YOUTUBE)->paginate($page);
    }

    public function getTiktokVideos($page = 6)
    {
        return $this->query()->where('category_id', Category::TIKTOK)->paginate($page);
    }
}
