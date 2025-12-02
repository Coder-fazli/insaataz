<?php

namespace App\Nova;

use App\Models\ProductPhotos;
use App\Utils\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mostafaznv\NovaCkEditor\CkEditor;

class ProductPhoto extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\ProductPhotos::class;
    public static $displayInNavigation = false;

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
        'id', 'title'
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
            Image::make('image')->creationRules(['required'])->path('products'),
            Boolean::make('Front Image', 'is_front')->default(false),
            Boolean::make('Back Image', 'is_back')->default(false),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */

    public static function afterCreate(NovaRequest $request, Model $model)
    {
        self::autoChangedImgType($model,$request);
        if (ProductPhotos::query()->where(['product_id' => $model->product_id, 'is_front' => true])->exists()) {
        } else {
            $model->is_front = true;
            $model->save();
        }

        if (ProductPhotos::where(['product_id' => $model->product_id, 'is_back' => true])->where('id', '!=', $model->id)->count() == 0) {
            $model->is_back = true;
            $model->save();
        }
    }

    public static function afterUpdate(NovaRequest $request, Model $model)
    {
        self::autoChangedImgType($model,$request);

        if (ProductPhotos::where(['product_id' => $model->product_id, 'is_back' => true])->where('id', '!=', $model->id)->count() == 0 && !$model->is_back) {
            throw ValidationException::withMessages(['is_back' => ['min one back image is required']]);
        }
        if (ProductPhotos::where(['product_id' => $model->product_id, 'is_front' => true])->where('id', '!=', $model->id)->count() == 0 && !$model->is_front) {
            throw ValidationException::withMessages(['is_front' => ['min one front image is required']]);
        }
    }

    public static function autoChangedImgType($model,$request)
    {
        if ($model->is_fornt) {
            ProductPhotos::where(['product_id' => $model->product_id])->where('id', '!=', $model->id)->update(['is_front' => false]);
        }
        if ($model->is_back) {
            ProductPhotos::where(['product_id' => $model->product_id])->where('id', '!=', $model->id)->update(['is_back' => false]);
        }
        if ($request->is_front && $request->is_back) {
            throw ValidationException::withMessages(['is_front' => ['One image must be back or front']]);
        }

    }

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

    public function getCategories()
    {

        $menuItems = \App\Models\Category::query()->whereNull('parent_id')->get();
        $categories = [];
        foreach ($menuItems as $menuItem) {
            $categories[$menuItem->id] = ['label' => $menuItem->title];
        }

        return $categories;
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


}
