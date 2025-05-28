<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Offer;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(8);

        $offers = Offer::where('is_active', true)->get();
        return view('home', compact('products', 'offers'));

        // return 'Hello, this is the home page.';
    }
    public function product($id)
{
    $product = Product::findOrFail($id);

    return response()->json([
        'id' => $product->id,
        'name' => $product->name,
        'description' => $product->description,
        'price' => $product->price,
        'image' => $product->image ? asset('storage/' . $product->image) : '/images/default-product.png',
    ]);
}

}