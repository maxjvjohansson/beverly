<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category');
        $priceOrder = $request->input('price_order');

        $categories = Category::all();

        $query = Product::query();

        // Apply search filter if search term exists
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Apply category filter if category is selected
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Apply sorting: If price_order is set, sort by price; otherwise, default to sorting by id
        if ($priceOrder) {
            $query->orderBy('price', $priceOrder);
        } else {
            $query->orderBy('id', 'asc');  // Default order by ID
        }

        // Paginate the products
        $products = $query->paginate(10);

        // Return the view with products and categories
        return view('products.index', compact('products', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
