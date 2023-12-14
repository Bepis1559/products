<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'productCategory' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Store the image
        $imagePath = $request->file('image')->store('images', 'public');

        // Create a new product associated with the user

        $product = $user->products()->create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'productCategory' => $request->input('productCategory'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); // Find the product by ID
        $userName = User::findOrFail($product->user_id)->name;
        return view('products.show', compact('product', 'userName'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'productCategory' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the product details
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'productCategory' => $request->input('productCategory'),
            'description' => $request->input('description'),
        ]);

        // Handle image update if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::disk('public')->delete($product->image);

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $product->update(['image' => $imagePath]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Ensure that the product belongs to the currently logged-in user
        if (auth()->user()->id !== $product->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the product image from storage
        Storage::disk('public')->delete($product->image);

        // Delete the product from the database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
