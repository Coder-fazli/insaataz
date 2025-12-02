<?php

namespace App\Nova;

use App\Models\ProductFilter;
use App\Utils\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mhaciyev\DependencyContainer\DependencyContainer;
use Mhaciyev\DependencyContainer\HasDependencies;
use Mostafaznv\NovaCkEditor\CkEditor;

class Order extends Resource
{
    use HasDependencies;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Order::class;

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

    private array $customFi = [];

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->customFi = [
            Text::make('Client', function () {
                return optional($this->client)->fullname ?? '-';
            })->sortable(),
            Text::make('name'),
            Text::make('phone'),
            Text::make('email'),
            Text::make('payment')
                ->displayUsing(function ($value) {
                    if ($value == "cash") {
                        return "Nağd";
                    } elseif ($value == "card") {
                        return "Kart";
                    } else {
                        return $value;
                    }
                }),
            Text::make('delivery')
                ->displayUsing(function ($value) {
                    if ($value == "take") {
                        return "Ofisdən";
                    } else {
                        return $value;
                    }
                }),
            Text::make('total'),
            Text::make('Item Count', 'item_count'),
        ];
    }

//->dependsOn(['category'],function ($field,NovaRequest $request,FormData $formData){
//    $this->customFi = [
//        Number::make('price33')
//    ];
//    return true;
//})


    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Client', function () {
                return optional($this->client)->fullname ?? '-';
            })->sortable(),
            Text::make('name'),
            Text::make('phone'),
            Text::make('email'),
            Textarea::make('message'),
            Text::make('payment')
                ->displayUsing(function ($value) {
                    if ($value == "cash") {
                        return "Nağd";
                    } elseif ($value == "card") {
                        return "Kart";
                    } else {
                        return $value;
                    }
                }),
            Text::make('delivery')
                ->displayUsing(function ($value) {
                    if ($value == "take") {
                        return "Ofisdən";
                    } else {
                        return $value;
                    }
                }),
            Text::make('total'),
            Text::make('Item Count', 'item_count'),
            Date::make('Created at', 'created_at'),
            HasMany::make('OrderItem', 'items'),
            DependencyContainer::make([])->dependsOnNotEmpty('category')->routeName(route('category-fields', 'category_id'))
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
        $model->slug = Helper::arraySlug($request->slug);
        $model->save();
    }

    public static function afterUpdate(NovaRequest $request, Model $model)
    {

        $model->slug = Helper::arraySlug($request->slug);

        if (!$request->attrs) {
            return;
        }

        $attributes = \App\Models\Attribute::query()->whereIn('id', $request->attrs)->with('group')->get();
        ProductFilter::where('product_id',$model->id)->delete();
        foreach ($attributes as $attr) {
            if ($attr) {
                ProductFilter::create(['product_id' => $model->id, 'attribute_id' => $attr->id, 'group_id' => $attr->group->id]);
            }
        }

        $model->save();
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
    public function authorizedToUpdate(Request $request)
    {
        return false;
    }
    public function authorizedToReplicate(Request $request)
    {
        return false;
    }
    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

}
