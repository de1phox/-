<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\PlantGenus;

class PlantGeneraComposer
{
    public function compose(View $view)
    {
        $genera = PlantGenus::get();
        $view->with('genera', $genera);
    }
}
