<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mostafaznv\NovaCkEditor\CkEditor;
use Laravel\Nova\Fields\File;

class About extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\About::class;

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
        return "About";
    }

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

            new Panel('Hero Section', [
                Text::make('Hero Badge', 'hero_badge')->translatable()
                    ->help('Small label above the title, e.g. Haqqımızda'),
                Text::make('Hero Title', 'hero_title')->translatable()
                    ->help('Main title, e.g. OREL İnşaat MMC'),
                Text::make('Hero Title Highlight', 'hero_title_highlight')->translatable()
                    ->help('Highlighted (blue) part of the title, e.g. Etibarlı Tərəfdaş'),
                Textarea::make('Hero Description', 'hero_description')->translatable(),
                File::make('Hero Logo', 'hero_image')
                    ->disk('public')
                    ->store($this->storeImage('images'))
                    ->prunable()
                    ->help('Logo shown in the hero card. Leave empty to use the default footer logo.'),
            ]),

            new Panel('Content Section ("Why us")', [
                Text::make('Content Badge', 'whyus_badge')->translatable()
                    ->help('e.g. Niyə Biz?'),
                Text::make('Content Title', 'whyus_title')->translatable(),
                Text::make('Content Title Highlight', 'whyus_title_highlight')->translatable()
                    ->help('Highlighted (blue) part of the heading'),
                Textarea::make('Content Lead', 'whyus_lead')->translatable()
                    ->help('Intro paragraph above the checklist'),
            ]),

            new Panel('Quality Guarantee Card', [
                Text::make('Guarantee Icon', 'guarantee_icon')
                    ->help('Font Awesome class, e.g. fas fa-award'),
                Text::make('Guarantee Title', 'guarantee_title')->translatable()
                    ->help('e.g. Keyfiyyət Zəmanəti'),
                Text::make('Guarantee Subtitle', 'guarantee_subtitle')->translatable()
                    ->help('e.g. ISO sertifikatlı xidmət'),
            ]),
        ];
    }

    /**
     * Reusable image storage callback.
     */
    protected function storeImage(string $folder): callable
    {
        return function (\Laravel\Nova\Http\Requests\NovaRequest $request, $model, $attribute) use ($folder) {
            $file = $request->file($attribute);
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $file->storeAs($folder, $filename, 'public');

            return [
                $attribute => $folder . '/' . $filename,
            ];
        };
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

    // public function authorizedToView(Request $request)
    // {
    //     return false;
    // }
}
