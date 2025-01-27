<?php

namespace App\Filament\Resources\OperationGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\OperationGraphResource;
use App\Filament\Resources\OperationGraphResource\Widgets\Filtered\FilteredDepositAccountClientChart;
use App\Filament\Resources\OperationGraphResource\Widgets\Filtered\FilteredINRInOutFlowChart;
use App\Filament\Resources\OperationGraphResource\Widgets\Filtered\FilteredUSDInOutFlowChart;

class FilteredOperationGraph extends Page
{
    protected static string $resource = OperationGraphResource::class;

    protected static string $view = 'filament.resources.operation-graph-resource.pages.filtered-operation-graph';

    protected ?string $heading = 'Filtered Operation Data';

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
        if ($selectedData === 'INR Inflow/Outflow') {
            $widgets[] = FilteredINRInOutFlowChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'USD Inflow/Outflow') {
            $widgets[] = FilteredUSDInOutFlowChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'Deposit Accounts & Clients') {
            $widgets[] = FilteredDepositAccountClientChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } else {
            // If 'selectedData' is empty, show all widgets
            $widgets = [
                FilteredINRInOutFlowChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredUSDInOutFlowChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredDepositAccountClientChart::make([
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
                ->url(OperationGraphResource::getUrl('index'))
                ->color('bnb-blue')
                ->icon('heroicon-o-arrow-left'),
        ];
    }

}
