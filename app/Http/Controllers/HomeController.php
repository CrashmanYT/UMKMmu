<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Product::select('category')
            ->distinct()
            ->pluck('category');

        $products = Product::latest()->take(8)->get(); 

        return view('home', compact('products', 'categories'));
    }


}
