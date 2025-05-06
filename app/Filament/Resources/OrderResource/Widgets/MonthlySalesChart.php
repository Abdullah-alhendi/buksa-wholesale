<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class MonthlySalesChart extends ChartWidget
{
    protected static ?string $heading = 'المبيعات الشهرية';

    protected function getData(): array
    {
        $sales = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->where('payment_status', 'paid')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'إجمالي المبيعات',
                    'data' => array_values($sales),
                ],
            ],
            'labels' => array_map(fn($m) => 'شهر ' . $m, array_keys($sales)),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // يمكنك تغييره إلى 'line' لو حبيت
    }
}
