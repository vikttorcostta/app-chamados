<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Response;

class CardDashboardCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de usuários', User::all()->count()),
            Stat::make('Total de Tickets', Ticket::all()->count()),
            Stat::make('Total de Respostas', Response::all()->count()),
            Stat::make('Total de Categorias', Category::all()->count()),
        ];
    }
}
