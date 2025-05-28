<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string',
        ]);

        Category::create([
            'name' => $validated['name'],
            'type' => $validated['type'] ?? 'other',
        ]);

        return redirect()->route('categories.index')->with('success', 'تمت إضافة الفئة بنجاح.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'تم تحديث الفئة بنجاح.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'تم حذف الفئة.');
    }
}
