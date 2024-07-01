<?php

namespace App\Nova;

// use App\Nova\Actions\DeleteLatestGallery;
// use App\Nova\Actions\EditLatestGallery;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Date;

use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
// use Newsroom\Createbutton\Createbutton;

class Gallery extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Gallery>
     */
    public static $model = \App\Models\Gallery::class;

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
        'id',
        'title',
        'button_text',
        'date',
        'likes',
        'link',
        'views',
        'description',
        'file_path'
    ];


    public static function search($query)
    {
        return static::where('latest_gallery', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
    }

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


            ID::make(('ID'), 'id')->sortable(),
            // Text::make('Latest Gallery', 'latest_gallery'),
            // Text::make('Button Text', 'button_text'),
            Number::make('Views', 'views'),
            Text::make('Description', 'description'),
            Number::make('Likes', 'likes'),
            Text::make('Link', 'link'),
            // File::make('File', 'file_path')->nullable(),
            // File::make('File', 'file_path')->disk('public')->sortable(),
            File::make('File', 'file_path')->disk('public')->path('images')->sortable(),




        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [
            // new Createbutton()
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return []; // news;
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
        return [
            // new EditLatestGallery,
            // new DeleteLatestGallery
        ];
    }
}
