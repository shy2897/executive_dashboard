<?php

namespace App\Filament\Resources;

use Filament\Forms\Form;
use App\Models\FinanceGraph;
use Filament\Resources\Resource;;
use App\Filament\Resources\FinanceGraphResource\Pages;
use App\Filament\Resources\FinanceGraphResource\RelationManagers;
use App\Filament\Resources\FinanceGraphResource\Pages\YearlyFinanceGraph;

class FinanceGraphResource extends Resource
{
    protected static ?string $model = FinanceGraph::class;

    protected static ?string $navigationLabel = "Finance";
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\FinanceGraphs::route('/'),
            'yearly-finance-graph' => Pages\YearlyFinanceGraph::route('/yearly-finance-graph'),
            'filtered-finance-graph' => Pages\FilteredFinanceGraph::route('/filtered-finance-graph'),
            'finance-view-detail-data' => Pages\FinanceData::route('/finance-view-detail-data'),

        ];
    }
}
