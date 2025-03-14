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

        $sortBy = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'asc');

        $categories = Category::all();
        $query = Product::query();

        // Search multiple criterias
        if ($search) {
            $query->where(
                function ($query) use ($search) {
                    $query->where('products.name', 'like', '%' . $search . '%')
                        ->orWhere('products.price', 'like', '%' . $search . '%')
                        ->orWhereHas(
                            'category',
                            function ($query) use ($search) {
                                $query->where('name', 'like', '%' . $search . '%');
                            }
                        );
                }
            );
        }

        // Filter by category
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Sort by category via category_id
        if ($sortBy == 'category') {
            $query->join('categories', 'products.category_id', '=', 'categories.id')
                ->orderBy('categories.name', $sortOrder);
        } else {
            // Sort by product criterias
            if (in_array($sortBy, ['name', 'price', 'id'])) {
                $query->orderBy($sortBy, $sortOrder);
            } else {
                $query->orderBy('products.id', 'asc'); // Default sorting
            }
        }

        $products = $query->select('products.*')->paginate(10);

        return view('products.index', compact('products', 'categories', 'sortBy', 'sortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|numeric|min:0',
                'img_url' => 'nullable|string|url',
                'unit' => 'required|in:ml,cl,l,fl oz,g,pcs',
                'volume' => 'required|numeric|min:0',
            ]
        );

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|numeric|min:0',
                'img_url' => 'nullable|string|url',
                'unit' => 'required|in:ml,cl,l,fl oz,g,pcs',
                'volume' => 'required|numeric|min:0',
            ]
        );

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
