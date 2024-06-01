<?php

namespace App\Providers;

use App\Models\ClimateZone;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\ClimateZonesComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['layouts/filters', 'admin/plants/form'], 'App\Http\ViewComposers\ClimateZonesComposer');
        View::composer(['layouts.filters', 'admin/plants/form'], 'App\Http\ViewComposers\LifeCyclesComposer');
        View::composer(['layouts.filters', 'admin/plants/form'], 'App\Http\ViewComposers\LightModesComposer');
        View::composer(['layouts.filters', 'admin/plants/form'], 'App\Http\ViewComposers\ProductTypesComposer');
        View::composer(['layouts.filters', 'admin/plants/form'], 'App\Http\ViewComposers\SoilsComposer');

        View::composer(['admin/plants/form'], 'App\Http\ViewComposers\PlantCategoriesComposer');
        View::composer(['admin/plants/form'], 'App\Http\ViewComposers\PlantColorsComposer');
        View::composer(['admin/plants/form'], 'App\Http\ViewComposers\PlantGeneraComposer');
    }
}
