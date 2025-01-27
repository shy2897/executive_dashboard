<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperationGraphResource\Pages;
use App\Filament\Resources\OperationGraphResource\RelationManagers;
use App\Models\OperationGraph;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OperationGraphResource extends Resource
{
    protected static ?string $model = OperationGraph::class;

    protected static ?string $navigationLabel = "Operation";
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

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
            'index' => Pages\OperationGraphs::route('/'),
            'yearly-operation-graph' => Pages\YearlyOperationGraph::route('/yearly-operation-graph'),
            'filtered-operation-graph' => Pages\FilteredOperationGraph::route('/filtered-operation-graph'),
            'operation-view-detail-data' => Pages\OperationData::route('/operation-view-detail-data'),
        ];
    }
}
