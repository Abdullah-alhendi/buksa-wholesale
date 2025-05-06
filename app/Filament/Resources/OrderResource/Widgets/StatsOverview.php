<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $topProduct = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->first();

        return [
            Stat::make('عدد المستخدمين', User::count())
                ->description('إجمالي المستخدمين')
                ->color('info'),

            Stat::make('عدد الطلبات', Order::count())
                ->description('إجمالي الطلبات')
                ->color('success'),

            Stat::make('إجمالي المبيعات', number_format(Order::where('payment_status', 'paid')->sum('total'), 2) . ' د.أ')
                ->description('الطلبات المدفوعة فقط')
                ->color('warning'),

            Stat::make('عدد المنتجات', Product::count())
                ->description('عدد المنتجات المتاحة')
                ->color('primary'),

            Stat::make('الطلبات المعلقة', Order::where('payment_status', 'pending')->count())
                ->description('طلبات لم يتم دفعها')
                ->color('danger'),

            Stat::make('الأكثر مبيعًا', $topProduct?->product->name ?? 'لا يوجد')
                ->description('أعلى منتج تم بيعه')
                ->color('secondary'),
        ];
    }
}
