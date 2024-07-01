<?php

namespace App\Nova;

// use App\Nova\Actions\DeleteBreadCrumb;
// use App\Nova\Actions\EditBreadcrumb;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
// use Newsroom\Createbutton\Createbutton;

class Breadcrumb extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Breadcrumb>
     */
    public static $model = \App\Models\Breadcrumb::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'breadcrumb1';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'breadcrumb1', 'breadcrumb2'
    ];

    public static function search($query)
    {
        return static::where('breadcrumb1', 'like', "%$query%")
            ->orWhere('breadcrumb2', 'like', "%$query%")
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
            BelongsTo::make('Header Navigation', 'headerNavigation', \App\Nova\HeaderNavigation::class)
                ->sortable()
                ->hideFromIndex()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Text::make('Home Page Name ', 'breadcrumb1')->sortable(),
            Text::make('Single Page Name', 'breadcrumb2')->sortable(),
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
        return [
            // new EditBreadcrumb,
            // new DeleteBreadCrumb
        ];
    }
}
