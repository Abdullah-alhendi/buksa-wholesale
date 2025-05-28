<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

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
    public function search(Request $request)
{
    $query = $request->input('query');
    $category = $request->input('category');

    $products = Product::query();

    if ($query) {
        $products = $products->where('name', 'like', "%{$query}%");
    }

    if ($request->filled('category')) {
    $products = $products->whereIn('category_id', (array) $request->category);
}


    $products = $products->paginate(12);

    return view('products.index', compact('products'));
}

}

