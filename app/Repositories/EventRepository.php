<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\EventImage;

class EventRepository extends AbstractRepository
{
    protected $modelClass = Event::class;

    public function getBySlug($slug, $with = [])
    {
        $lang = app()->getLocale();
        return $this->query()->with($with)->where("slug->{$lang}", $slug)->firstOrFail();
    }

    public function paginateImages($event_id, $count = 2)
    {
        return EventImage::where('event_id', $event_id)->paginate($count);
    }
}
