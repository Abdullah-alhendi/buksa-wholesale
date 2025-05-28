<?php
namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
public function index()
{
$orders = Order::with('items')
    ->where('user_id', Auth::User()->id)
    ->latest()
    ->paginate(10);
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