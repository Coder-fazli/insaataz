<?php

namespace App\Nova\Settings;

use App\Enum\Status;
use App\Nova\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Lang extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Lang::class;

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
        'id', 'title', ''
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
            Text::make('title')
                ->creationRules(['required', 'min:2'])
                ->updateRules(['required', 'min:2']),
            Text::make('code')
                ->creationRules(['required', 'min:2'])
                ->updateRules(['required', 'min:2']),
            Boolean::make('status')->default(false),
            Boolean::make('default')->default(false),
        ];
    }

    public static function afterCreate(NovaRequest $request, Model $model)
    {
        self::changeDefault($request, $model);


    }

    public static function afterUpdate(NovaRequest $request, Model $model)
    {
        self::changeDefault($request, $model);

    }



    public static function changeDefault(NovaRequest $request, Model $model)
    {
        if ($request->default) {
            \App\Models\Lang::query()->where('default', Status::ACTIVE)->where('id', '!=', $model->id)->update(['default' => Status::INACTIVE]);
        }
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

    public static function group()
    {
        return 'SETTINGS';
    }
}
