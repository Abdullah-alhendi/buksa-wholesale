<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
    return view('products.index', compact('products'));
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
    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'wholesale_price' => 'required|numeric',
        'stock' => 'required|integer',
        'unit' => 'required|string',
        'min_order' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // 1. خزن الصورة في storage
        $storagePath = $request->file('image')->store('products', 'public');

        // 2. انقلها إلى public/images/products
        $filename = basename($storagePath);
        $sourcePath = storage_path("app/public/products/{$filename}");
        $destinationPath = public_path("images/products/{$filename}");

        // تأكد أن مجلد الوجهة موجود
        if (!File::exists(public_path('images/products'))) {
            File::makeDirectory(public_path('images/products'), 0755, true);
        }

        // نسخ الصورة
        File::copy($sourcePath, $destinationPath);

        // 3. خزّن فقط اسم الملف (أو المسار الجديد حسب ما بدك)
        $validated['image'] = "images/products/{$filename}";
    }

    Product::create($validated);

    return redirect()->route('products.index')->with('success', 'تم إضافة المنتج بنجاح');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function search(Request $request)
{
    $query = $request->input('query');
    $category = $request->input('category');

    $products = Product::query();

    if ($query) {
        $products = $products->where('name', 'like', "%{$query}%");
    }

    if ($category) {
        $products = $products->where('category_id', $category);
    }

    $products = $products->paginate(12);

    return view('products.index', compact('products'));
}

}
