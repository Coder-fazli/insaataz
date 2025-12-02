<?php

namespace App\Repositories;

use App\Models\Settings;
use Illuminate\Support\Facades\Cache;

class SettingsRepository extends AbstractRepository
{
    protected $modelClass = Settings::class;

    public function getSettings()
    {
        return Cache::rememberForever('settings', function () {
            return $this->query()->first();
        });
    }
}
