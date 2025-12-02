<?php

namespace App\Repositories;

use App\Models\Meeting;

class MeetingRepository extends AbstractRepository
{
    protected $modelClass = Meeting::class;

    public function getBySlug($slug, $with = [])
    {
        $lang = app()->getLocale();
        return $this->query()->with($with)->where("slug->{$lang}", $slug)->firstOrFail();
    }

    public function randomMeetings($count = 3, $ingore_id = 0)
    {
        return $this->query()->orderByRaw('RAND()')->where('id', '!=', $ingore_id)->limit($count)->get();
    }
}
