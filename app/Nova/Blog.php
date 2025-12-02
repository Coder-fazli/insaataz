<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Mostafaznv\NovaCkEditor\CkEditor;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Str;

class Blog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Blog::class;

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
        'title', 'description', 'slug'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('title')->rules(['required'])->translatable(),
            CkEditor::make('description')->rules(['required'])->translatable(),
            Text::make('Slug')->nullable(),
            File::make('Image')
                ->disk('public')
                ->store(function (\Laravel\Nova\Http\Requests\NovaRequest $request, $model) {
                    // Dosya yükleme işlemini burada gerçekleştirin
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;
                    $path = $file->storeAs('blog', $filename, 'public'); // 'public' diski kullanın
                        
                    // Dosya yolu veritabanına kaydedin (blog/ ile başlayan bir dizin içinde)
                    return [
                        'image' => 'blog/' . $filename,
                    ];
                })
                ->prunable(),
            Number::make('View')->exceptOnForms(),
            DateTime::make('Date', 'created_at')->exceptOnForms(),
            
            
            HasMany::make('BlogPhoto', 'photos')
        ];
    }

    public static function afterCreate(Request $request, $model)
    {
        self::updateSlug($request, $model);
    }
    
    public static function afterUpdate(Request $request, $model)
    {
        self::updateSlug($request, $model);
    }
    
    public static function updateSlug(Request $request, $model)
    {
        if (empty($model->slug) || $model->slug == null) {
            $model->slug = Str::slug($model->title);
            $model->save();
        }
    }


    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
