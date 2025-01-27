<?php

namespace App\Filament\Resources\HRMGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\HRMGraphResource;
use App\Filament\Resources\HRMGraphResource\Widgets\Filtered\FilteredEmployeeCountChart;
use App\Filament\Resources\HRMGraphResource\Widgets\Filtered\FilteredTotalEmployee;

class FilteredHRMGraph extends Page
{
    protected static string $resource = HRMGraphResource::class;

    protected static string $view = 'filament.resources.h-r-m-graph-resource.pages.filtered-h-r-m-graph';

    protected ?string $heading = 'Filtered HRM Data';

    protected function getHeaderWidgets(): array
    {
        // Access query parameters
        $startYear = request()->query('startYear');
        $startMonth = request()->query('startMonth');
        $endYear = request()->query('endYear');
        $endMonth = request()->query('endMonth');
        $selectedData = request()->query('selectedData'); // Selected data parameter

        // Initialize the widget array
        $widgets = [];

        // Conditional logic based on the 'selectedData' parameter
        if ($selectedData === 'Head Count') {
            $widgets[] = FilteredEmployeeCountChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'Total Employees') {
            $widgets[] = FilteredTotalEmployee::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } else {
            // If 'selectedData' is empty, show all widgets
            $widgets = [
                FilteredEmployeeCountChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredTotalEmployee::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
            ];
        }

        return $widgets;
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
