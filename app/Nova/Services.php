<?php

namespace App\Nova;

use App\Enum\Status;
use App\Utils\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Color;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mostafaznv\NovaCkEditor\CkEditor;

class Services extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Services::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    public static function label()
    {
        return "Services";
    }

    public static $displayInNavigation = false;

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
            Text::make('title')->rules(['required'])->translatable(),
             Text::make('slug')->rules(['required'])->translatable(),
            Text::make('sub_title')->rules(['required'])->translatable(),
            CkEditor::make('description')->translatable(),
            Image::make('image')->creationRules(['required'])->path('services')->deletable(false),
            Image::make('icon','icon_name')->path('services')->deletable(false),
            Boolean::make('status')->trueValue(Status::ACTIVE)->falseValue(Status::INACTIVE)->default(Status::ACTIVE),

            Text::make('Banner Title','banner_title')->rules(['required'])->translatable()->hideFromIndex(),
            Text::make('Banner SubTitle','banner_subtitle')->rules(['required'])->translatable()->hideFromIndex(),
            Image::make('Banner Image','banner_image')->path('services')->required()->hideFromIndex()->deletable(false),

//            BelongsTo::make('instructor','instructor',Instructor::class)
        ];
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
    public static function afterCreate(NovaRequest $request, Model $model)
    {
        $model->slug =Helper::arraySlug($request->slug);
        $model->save();
    }

    public static function afterUpdate(NovaRequest $request, Model $model)
    {
        $model->slug = Helper::arraySlug($request->slug);
        $model->save();
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

//    public static function authorizedToCreate(Request $request)
//    {
//        return false;
//    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToReplicate(Request $request)
    {
        return false;
    }

    public function authorizedToView(Request $request)
    {
        return false;
    }
}
