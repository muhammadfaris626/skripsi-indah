<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class GrafikPerTigaBulan extends ChartWidget
{
    protected static ?string $heading = 'Chart Sales / 3 month';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan-Mar', 'Apr-Jun', 'Jul-Sep', 'Oct-Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
