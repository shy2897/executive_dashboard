<?php

namespace App\Filament\Resources\HRMGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\HRMGraphResource;
use App\Filament\Resources\HRMGraphResource\Widgets\Yearly\YearlyEmployee;
use App\Filament\Resources\HRMGraphResource\Widgets\Yearly\YearlyEmployeeCount;
use App\Filament\Resources\HRMGraphResource\Widgets\Yearly\YearlyEmployeeHeadCount;

class YearlyHRMGraph extends Page
{
    protected static string $resource = HRMGraphResource::class;

    protected static string $view = 'filament.resources.h-r-m-graph-resource.pages.yearly-h-r-m-graph';

    protected ?string $heading = 'Yearly HRM Data';

    protected function getHeaderWidgets(): array
    {
        return [
            YearlyEmployeeHeadCount::class,
            YearlyEmployee::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Monthly Comparison')
                ->label('Monthly Comparison')
                ->url(HRMGraphResource::getUrl('index'))
                ->color('bnb-blue')
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}
