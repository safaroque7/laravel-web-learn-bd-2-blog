<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.pages.modules.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.modules.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        return $data = $request->all();

        $category = Category::latest()->first();
        if($category){
            $data['slug_id'] = $category->slug_id + 1;
        } else {
            $data['slug_id'] = 100000;
        }
        Category::create($data);
        session()->flash('msg', 'Category created successfully');
        session()->flash('class', 'success');
        
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('backend.pages.modules.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.pages.modules.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
  
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        dd($request);

        $category->update($request->all());
        session()->flash('msg', 'Category updated successfully');
        session()->flash('class', 'success');
        return redirect()->route('category.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('msg', 'Category deleted successfully');
        session()->flash('class', 'warning');
        return redirect()->route('category.index');
    }
}
