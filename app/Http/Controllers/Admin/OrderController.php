<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items.product');
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,cancelled'
        ]);

        $order->update(['status' => $request->status]);
        return back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'تم حذف الطلب.');
    }
}
