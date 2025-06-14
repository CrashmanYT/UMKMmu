<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::with('seller');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
    }


        $products = $query->latest()->get();

        $categories = Product::select('category')->distinct()->pluck('category');

        return view('catalog', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('seller')->findOrFail($id);
        return view('catalog.show', compact('product'));
    }

}
