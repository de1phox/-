<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Soil;

class SoilsComposer
{
    public function compose(View $view)
    {
        $soils = Soil::get();
        $view->with('soils', $soils);
    }
}
