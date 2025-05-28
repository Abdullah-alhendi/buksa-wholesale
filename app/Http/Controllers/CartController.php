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

        $is_wholesale = $request->input('is_wholesale', 0);
        $quantity = $request->input('quantity', 1);

        // السعر المناسب
        $price = $is_wholesale && $product->wholesale_price < $product->price
            ? $product->wholesale_price
            : $product->price;

        // ابحث عن العنصر في السلة بنفس نوع السعر
        $item = $cart->items()
            ->where('product_id', $product->id)
            ->where('is_wholesale', $is_wholesale)
            ->first();

        if ($item) {
            $item->quantity += $quantity;
            $item->price = $price; // في حال تغير السعر بالجملة
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity'   => $quantity,
                'is_wholesale' => $is_wholesale, // يجب أن يكون موجود في جدول cart_items
                'price' => $price, // يجب أن يكون موجود في جدول cart_items
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

    public function update(Request $request, Product $product)
    {
        $quantity = $request->input('quantity');
        $is_wholesale = $request->input('is_wholesale', 0);

        $cart = Cart::where('user_id', Auth::id())->where('checked_out', false)->first();
        if ($cart) {
            $item = $cart->items()
                ->where('product_id', $product->id)
                ->where('is_wholesale', $is_wholesale)
                ->first();
            if ($item) {
                $item->quantity = $quantity;
                $item->save();
            }
        }

        return redirect()->route('cart.index')->with('success', 'تم تحديث الكمية بنجاح');
    }
}
