<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Http\Requests\NovaRequest;

class UploadFiles extends Resource
{
    /**
     * The model the resource corresponds to.
     */
    public static $model = \App\Models\File::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     */
    public static $search = [
        'id', 'title', 'description'
    ];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Select::make('Type')->options([
                'latestVideos' => 'Latest Videos',
                'latestNews' => 'Latest News',
                'latestGallery' => 'Latest Gallery',
            ])->sortable()->rules('required'),



            // Textarea::make('Description')
            //     ->rules('required'),

            // Text::make('Link')
            //     ->nullable()
            //     ->rules('url'),

            // Number::make('Likes')
            //     ->sortable()
            //     ->rules('required', 'integer', 'min:0'),

            // Number::make('Views')
            //     ->sortable()
            //     ->rules('required', 'integer', 'min:0'),

            File::make('File', 'file_path')
                ->disk('public')
                ->rules('required', 'file'),
        ];
    }

    // Other Nova configurations such as cards, filters, lenses, actions can be defined below



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
