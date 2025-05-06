<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|url'
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'تم إضافة المنتج بنجاح.');
    }

    public function show($id)
{
    $product = \App\Models\Product::findOrFail($id);
    return response()->json($product);
}


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|url'
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'تم حذف المنتج.');
    }
}

