<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\PlantColor;

class PlantColorsComposer
{
    public function compose(View $view)
    {
        $plant_colors = PlantColor::get();
        $view->with('plant_colors', $plant_colors);
    }
}
