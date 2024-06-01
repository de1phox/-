<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\PlantCategory;

class PlantCategoriesComposer
{
    public function compose(View $view)
    {
        $plant_categories = PlantCategory::get();
        $view->with('plant_categories', $plant_categories);
    }
}
