<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\ProductType;

class ProductTypesComposer
{
    public function compose(View $view)
    {
        $product_types = ProductType::get();
        $view->with('product_types', $product_types);
    }
}
