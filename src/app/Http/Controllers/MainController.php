<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\PlantCategory;
use App\Http\Filters\PlantFilter;
use App\Http\Requests\PlantRequest;

class MainController extends Controller
{
    public function Index(PlantRequest $request){
        $data = $request->validated();
        $filter = app()->make(PlantFilter::class, ['queryParams' => array_filter($data)]);
        $products = Plant::filter($filter)->paginate(9);
        return view('frontend/index', [
            'products' => $products]);
    }

    public function categories() {
        $categories = PlantCategory::paginate(6);
        return view('frontend/categories', compact('categories'));
    }

    public function category($id, PlantRequest $request) {
        $data = $request->validated();
        $filter = app()->make(PlantFilter::class, ['queryParams' => array_filter($data)]);
		$category = PlantCategory::where('id', $id)->first();
        if(!is_object($category))
            return abort(404);
        $products = $category->plants()->filter($filter)->paginate(9);
        return view('frontend/category', compact('category', 'products'));
    }

    public function product($id) {
        $product = Plant::where('id', $id)->first();
        if(!is_object($product))
            return abort(404);
        return view('frontend/product', compact('product'));
    }
}
