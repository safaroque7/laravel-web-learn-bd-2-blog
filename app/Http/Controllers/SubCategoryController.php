<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index()
    {
        $subCategoriesCollection = SubCategory::with(['category'])->orderBy('serial', 'asc')->get();
        return view('backend.pages.modules.sub-category.index', compact('subCategoriesCollection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategoryNames = Category::pluck('category_name', 'id');
        return view('backend.pages.modules.sub-category.create', compact('allCategoryNames'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $sub_category = $request->all();
        $subCategory = SubCategory::latest()->first();

        if ($subCategory) {
            $sub_category['serial'] = $subCategory->serial + 1;
        } else {
            $sub_category['serial'] = 100000;
        }

        $subCategoriesCollection = SubCategory::create($sub_category);
        return view('backend.pages.modules.sub-category.index', compact('subCategoriesCollection'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        $subCategory->load('category');
        return view('backend.pages.modules.sub-category.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
