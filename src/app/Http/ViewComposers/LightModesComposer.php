<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\LightMode;

class LightModesComposer
{
    public function compose(View $view)
    {
        $light_modes = LightMode::get();
        $view->with('light_modes', $light_modes);
    }
}
