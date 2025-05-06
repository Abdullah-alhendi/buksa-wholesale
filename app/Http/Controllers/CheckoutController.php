<?php
// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->where('checked_out', false)->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'سلتك فارغة!');
        }

        $total = 0;
        foreach ($cart->items as $item) {
            $total += $item->product->price * $item->quantity;
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:stripe,cod',
        ]);

        $cart = Cart::where('user_id', Auth::id())->where('checked_out', false)->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'السلة فارغة!');
        }

        $total = 0;
        foreach ($cart->items as $item) {
            $total += $item->product->price * $item->quantity;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'payment_method' => $validated['payment_method'],
            'total' => $total,
            'payment_status' => 'pending',
        ]);

        foreach ($cart->items as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }

        if ($validated['payment_method'] === 'stripe') {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $lineItems = [];
            foreach ($cart->items as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'sar',
                        'product_data' => ['name' => $item->product->name],
                        'unit_amount' => $item->product->price * 100,
                    ],
                    'quantity' => $item->quantity,
                ];
            }

            $checkoutSession = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
                'metadata' => ['order_id' => $order->id],
            ]);

            $order->payment_intent_id = $checkoutSession->id;
            $order->save();

            return redirect($checkoutSession->url);
        }

        $cart->checked_out = true;
        $cart->save();

        return redirect()->route('checkout.success')->with('success', 'تم تأكيد الطلب والدفع عند الاستلام.');
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if ($sessionId) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = StripeSession::retrieve($sessionId);
            $orderId = $session->metadata->order_id;

            $order = Order::find($orderId);
            if ($order) {
                $order->payment_status = 'paid';
                $order->save();
            }

            $cart = Cart::where('user_id', Auth::id())->where('checked_out', false)->first();
            if ($cart) {
                $cart->checked_out = true;
                $cart->save();
            }
        }

        return view('checkout.success');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
