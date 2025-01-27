<?php

namespace App\Filament\Resources\OperationGraphResource\Widgets\Data;

use Filament\Tables;
use App\Models\Operation;
use Filament\Tables\Table;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class OperationTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Operation Data ';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Operation::query()
            )
            ->columns([
                TextColumn::make('description')
                ->searchable(),
            TextColumn::make('date')
                ->date()
                ->sortable()
                ->searchable(),
            TextColumn::make('data')
                ->searchable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('date', 'desc');
    }

}
