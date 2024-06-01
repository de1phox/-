<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\ClimateZone;

class ClimateZonesComposer
{
    public function compose(View $view)
    {
        $climate_zones = ClimateZone::get();
        $view->with('climate_zones', $climate_zones);
    }
}
