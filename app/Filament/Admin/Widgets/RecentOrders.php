<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentOrders extends TableWidget
{
    protected static ?string $heading = 'أحدث الطلبات';

    protected function getTableQuery(): Builder
    {
        return Order::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id')->label('رقم الطلب'),
            TextColumn::make('user.name')->label('العميل'),
            TextColumn::make('total')->label('الإجمالي')->money('JOD'),
            TextColumn::make('payment_status')->label('حالة الدفع'),
            TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime(),
        ];
    }
}
