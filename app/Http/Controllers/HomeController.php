<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Offer;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        $offers = Offer::where('is_active', true)->get();
        return view('home', compact('products', 'offers'));
    }
}