<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
{
    $cart = Cart::where('user_id', Auth::id())
                ->where('checked_out', false)
                ->with('items.product')
                ->first();

    return view('cart.index', compact('cart'));
}

public function add(Request $request, Product $product)
{
    $cart = Cart::firstOrCreate(
        ['user_id' => Auth::id(), 'checked_out' => false]
    );

    $item = $cart->items()->where('product_id', $product->id)->first();

    if ($item) {
        $item->quantity += $request->input('quantity', 1);
        $item->save();
    } else {
        $cart->items()->create([
            'product_id' => $product->id,
            'quantity' => $request->input('quantity', 1),
        ]);
    }

    return back()->with('success', 'تم إضافة المنتج إلى السلة.');
}

public function remove(Product $product)
{
    $cart = Cart::where('user_id', Auth::id())->where('checked_out', false)->first();

    if ($cart) {
        $cart->items()->where('product_id', $product->id)->delete();
    }

    return back()->with('success', 'تم إزالة المنتج من السلة.');
}

public function clear()
{
    $cart = Cart::where('user_id', Auth::id())->where('checked_out', false)->first();

    if ($cart) {
        $cart->items()->delete();
    }

    return back()->with('success', 'تم تفريغ السلة.');
}

}
