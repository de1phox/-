<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlantCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PlantCategory::get();
        return view('admin/categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/categories/form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PlantCategory::create($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PlantCategory $category)
    {
        return view('admin/categories/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlantCategory $category)
    {
        return view('admin/categories/form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlantCategory $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantCategory $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
