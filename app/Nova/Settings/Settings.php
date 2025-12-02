<?php

namespace App\Nova\Settings;

use App\Nova\Resource;
use Fourstacks\NovaRepeatableFields\Repeater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Orlyapps\NovaMultilineText\MultilineText;
use Whitecube\NovaFlexibleContent\Flexible;
use function trans;

class Settings extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Settings::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Flexible::make('Phone')
                ->addLayout('add phone number', 'Phone', [
                    Text::make('phone'),
                ])->button('add phone')->showOnIndex(false),

            Flexible::make('Email')
                ->addLayout('add email address', 'email', [
                    Text::make('email'),
                ])->button('add email'),

            Text::make('Facebook', 'facebook'),
            Text::make('Instagram', 'instagram'),
            Text::make('Youtube', 'youtube'),
            Text::make('Twitter', 'twitter'),
            Textarea::make('Address', 'address')->rules(['required'])->translatable(),
            Text::make('Map (iframe-in src-sinin içindəkini yükləyin)', 'map')->rules(['required'])->hideFromIndex(),

            Image::make('logo')->path('images'),
            Image::make('favicon')->path('images'),

        ];
    }

    public static function afterUpdate(NovaRequest $request, Model $model)
    {
        Cache::forget('settings');
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToReplicate(Request $request)
    {
        return false;
    }

    public static function label()
    {
        return 'Main Information';
    }

    public static function group(): string
    {
        return trans('SETTINGS');
    }
}