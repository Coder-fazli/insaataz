<?php

namespace App\Providers;

use App\Enum\Status;
use App\Models\Lang;
use App\Repositories\SettingsRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        ini_set('memory_limit', '-1');
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(SettingsRepository $repository)
    {
        $this->overrideLocalizationConfig();
         if (Schema::hasTable('settings')){
             View::share('settings',$repository->getSettings());
         }
    }


    public function overrideLocalizationConfig()
    {
        if (Schema::hasTable((new Lang())->getTable())) {
            $languages = Lang::where('status',Status::ACTIVE)->get();
            $supportedLocales = [];
            $novaTranslatable = [];

            foreach ($languages as $language) {
                $novaTranslatable[$language->code] = $language->title;
                $supportedLocales[$language->code] = ['name' => $language->title];
            }

            if ($supportedLocales) {
                config([
                    'laravellocalization.supportedLocales' => $supportedLocales
                ]);
            }

            if ($novaTranslatable) {
                config([
                    'nova-translatable.locales' => $novaTranslatable
                ]);
            }
        }
    }
}
