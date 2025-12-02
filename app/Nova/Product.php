<?php

namespace App\Nova;

use App\Models\ProductFilter;
use App\Utils\Helper;
use App\Models\Product as ProductModel;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mhaciyev\DependencyContainer\DependencyContainer;
use Mhaciyev\DependencyContainer\HasDependencies;
use Mostafaznv\NovaCkEditor\CkEditor;
use Illuminate\Support\Str;


class Product extends Resource
{
    use HasDependencies;

    public static $model = \App\Models\Product::class;
    public static $title = 'title';
    public static $search = ['id', 'title', 'slug', 'code'];

    private array $customFi = [];

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->customFi = [
            Text::make('tofiq1'),
            Text::make('tofiq2')
        ];
    }

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('category', 'category')->nullable(),
            BelongsTo::make('brand', 'brand')->nullable(),
            Text::make('title')->creationRules(['required'])->translatable(),
            Text::make('slug')->translatable(),
            Text::make('price')->creationRules(['required']),
            Text::make('Code'),
            Text::make('Discount Price', 'discount_price')->nullable(),
            Number::make('stock')->default(0),
            Number::make('ordering')->default(0),
            Number::make('is_chosen')->default(0),
            CkEditor::make('desc')->translatable(),
            Boolean::make('status')->default(true),
//            Boolean::make(__('site.chosen_for_you'), 'is_chosen')->default(false),
            Boolean::make(__('site.best_seller'), 'is_best_seller')->default(false),
            Boolean::make('is_boru')->default(true),
            Number::make(__('site.order'), 'order')->sortable()->default(0),
            HasMany::make('ProductFeature', 'features'),
            HasMany::make('ProductPhoto', 'photos'),
            HasMany::make('product_shema_images', 'product_shema_images')
        ];
    }

    public static function afterCreate(NovaRequest $request, Model $model)
    {
        self::generateSlug($model, $request->title);
        self::adjustOrder($model, $request->order, $request->category);
    }

    public static function afterUpdate(NovaRequest $request, Model $model)
    {
        self::generateSlug($model, $request->title);
        self::adjustOrder($model, $request->order, $request->category);

        // ... existing code ...
    }

    public static function afterDelete(NovaRequest $request, Model $model)
    {
        self::adjustOrderOnDelete($model->order, $model->category_id);
    }

    protected static function adjustOrder(Model $model, $order, $category)
    {
        // Increase the order for products with order greater than or equal to the current order
        ProductModel::where('order', '>=', $order)
            ->where('category_id', $category)
            ->where('id', '<>', $model->id)
            ->increment('order');

        // Set the order for the current product
        $model->order = $order;
        $model->save();
    }

    protected static function adjustOrderOnDelete($order, $category)
    {
        // Decrease the order for products with order greater than the deleted product's order
        ProductModel::where('order', '>', $order)
            ->where('category_id', $category)
            ->decrement('order');
    }
    protected static function generateSlug(Model $model, $title)
    {
        if (empty($model->slug) && is_array($title) && !empty($title)) {
            $slugTranslations = [];
            $randomInt = random_int(100000, 999999);
            
            foreach ($title as $locale => $translation) {
                $slugTranslations[$locale] = Str::slug($translation) . "-" . $randomInt;
            }
    
            $model->slug = Helper::arraySlug($slugTranslations);
            $model->save();
        } elseif (is_array($model->slug)) {
            $model->slug = Helper::arraySlug($model->slug);
            $model->save();
        }
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

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

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
