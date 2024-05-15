<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\PlantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function Index(){
        $products = Plant::get();
        return view('frontend/index', [
            'products' => $products]);
    }

    public function categories() {
        $categories = PlantCategory::get();
        return view('frontend/categories', compact('categories'));
    }

    public function category($id) {
        $category = PlantCategory::where('id', $id)->first();
        if(!is_object($category))
            return abort(404);
        return view('frontend/category', compact('category'));
    }

    public function product($id) {
        $product = Plant::where('id', $id)->first();
        if(!is_object($product))
            return abort(404);
        return view('frontend/product', compact('product'));
    }
}
