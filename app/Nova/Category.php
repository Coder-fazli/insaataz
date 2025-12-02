<?php

namespace App\Nova;

use App\Utils\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mhaciyev\DependencyContainer\DependencyContainer;
use Mhaciyev\DependencyContainer\HasDependencies;
use Mostafaznv\NovaCkEditor\CkEditor;
use OsTheNeo\NovaFields\BelongsToManyField;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Number;
class Category extends Resource
{
    use HasDependencies;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Category::class;

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
            \Laravel\Nova\Fields\BelongsTo::make('category','category')->nullable(true),
            Text::make('title')->creationRules(['required'])->translatable(),
            Text::make('slug')->translatable(),
            CkEditor::make('desc')->translatable(),
            Boolean::make('status')->default(true),
            Image::make('image'),
            Number::make('Order')->sortable()->default(\App\Models\Category::max('order') + 1),
            BelongsToManyField::make('AttributeGroup','attributesGroup',AttributeGroup::class),


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
        self::generateSlug($model, $request->title);
    }

    public static function afterUpdate(NovaRequest $request, Model $model)
    {
        self::generateSlug($model, $request->title);
    }

  protected static function generateSlug(Model $model, $title)
{
    if (empty($model->slug) && is_array($title) && !empty($title)) {
        $slugTranslations = [];

        foreach ($title as $locale => $translation) {
            $slugTranslations[$locale] = Str::slug($translation);
        }

        $model->slug = Helper::arraySlug($slugTranslations);
        $model->save();
    } else {
        // Here, you should pass an array to Helper::arraySlug
        $model->slug = Helper::arraySlug([$model->slug]);
        $model->save();
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
        $categories=[];
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
