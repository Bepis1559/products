<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // products
    public function products(Request $request)
    {
        $categories = Category::all();
        $categoryName = $request->input('category', ''); // Retrieve category from the request
        $filteredProducts = Product::when($categoryName, function ($query, $categoryName) {
            return $query->whereHas('category', function ($subquery) use ($categoryName) {
                $subquery->where('name', $categoryName);
            });
        })
            ->get();

        return view('admin.products', compact('filteredProducts', 'categories', 'categoryName'));
    }
}
