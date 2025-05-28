<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $existing = ProductReview::where('product_id', $request->product_id)
                                 ->where('user_id', Auth::id())
                                 ->first();

        if ($existing) {
            return back()->with('error', 'لقد قمت بتقييم هذا المنتج مسبقًا.');
        }

        ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'تم إرسال التقييم بنجاح.');
    }
}
