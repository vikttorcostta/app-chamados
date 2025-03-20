<?php

namespace App\Filament\Widgets;

use App\Models\Response;
use App\Models\Ticket;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class ResponsesByMonthChart extends ChartWidget
{
    protected static ?string $heading = 'Respostas';

    protected function getData(): array
    {
//        $trendData = Trend::model(Response::class)
//            ->between(
//                start: now()->startOfYear(),
//                end: now()->endOfYear(),
//            )
//            ->perMonth()
//            ->count();

        return [
//            'datasets' => [
//                [
//                    'label' => 'Respostas',
//                    'data' => array_values($trendData->map(fn ($item) => $item->aggregate)->toArray()),
//                    'backgroundColor' => '#36A2EB',
//                    'borderColor' => '#9BD0F5',
//                ],
//            ],
//            'labels' => array_values($trendData->map(fn ($item) => $item->date)->toArray()),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
