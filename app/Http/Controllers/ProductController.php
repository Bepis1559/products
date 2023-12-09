<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // method conventions
    // 1. index - show a list of resources
    // 2. create - show form to create a new resource
    // 3. store(Request $request) - storing a new resource in the db
    // 4. show($id) - show a specific resource
    // 5. edit($id) - show form to edit a resource
    // 6. update(Request $request, $id) logic for updating a resource in the db
    // 7. destroy($id) - logic for deleting a resource from the db
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryName = $request->input('category', ''); // Retrieve category from the request
        $filteredProducts = Product::when($categoryName, function ($query, $categoryName) {
            return $query->whereHas('category', function ($subquery) use ($categoryName) {
                $subquery->where('name', $categoryName);
            });
        })
            ->get();

        return view('products.index', compact('filteredProducts', 'categories', 'categoryName'));
    }


    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'productCategory' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');
        Product::create([
            'name' => $request->input('name'),
            'productCategory' => $request->input('productCategory'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
