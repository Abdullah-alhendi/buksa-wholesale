<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // فلترة حسب البحث
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }

        // فلترة حسب الفئة
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        // ترتيب النتائج
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'popular':
                    $query->orderBy('sales_count', 'desc');
                    break;
                case 'wholesale':
                    $query->whereColumn('wholesale_price', '<', 'price')
                          ->orderByRaw('(price - wholesale_price) DESC');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(12);

        // جلب الفئات من قاعدة البيانات
        $categories = Category::orderBy('name')->get();

        return view('shop.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }
}
