<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class MonthlySalesChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
