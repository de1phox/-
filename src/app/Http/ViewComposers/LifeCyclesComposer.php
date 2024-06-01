<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\LifeCycle;

class LifeCyclesComposer
{
    public function compose(View $view)
    {
        $life_cycles = LifeCycle::get();
        $view->with('life_cycles', $life_cycles);
    }
}
