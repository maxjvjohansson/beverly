<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortBy = $request->get('sort_by', 'id');  // Standard sortering: ID
        $sortOrder = $request->get('sort_order', 'asc');  // Standard ordning: asc

        $categories = Category::query();

        // Sortering enligt sortBy och sortOrder
        if (in_array($sortBy, ['id', 'name', 'description'])) {
            $categories->orderBy($sortBy, $sortOrder);
        }

        $categories = $categories->paginate(10);

        return view('categories.index', compact('categories', 'sortBy', 'sortOrder'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
            'name' => 'required|string|max:255',
            'description' => 'required|string'
            ]
        );

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category was created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate(
            [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            ]
        );

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category was deleted successfully!');
    }
}
