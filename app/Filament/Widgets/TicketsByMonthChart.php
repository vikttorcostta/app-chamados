<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\TrendValue;
use Flowframe\Trend\Trend;


class TicketsByMonthChart extends ChartWidget
{
    protected static ?string $heading = 'Tickets';

    protected function getData(): array
    {
        $trendData = Trend::model(Ticket::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Tickets criados',
                    'data' => array_values($trendData->map(fn ($item) => $item->aggregate)->toArray()),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => array_values($trendData->map(fn ($item) => $item->date)->toArray()),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
