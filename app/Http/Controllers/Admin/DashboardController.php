<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $userCount = User::count();
        $totalSales = Order::where('status', 'paid')->sum('total');

        return view('admin.dashboard', compact('productCount', 'orderCount', 'userCount', 'totalSales'));
    }
}
