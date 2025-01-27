<?php

namespace App\Filament\Resources\FinanceGraphResource\Widgets\Data;

use Filament\Tables;
use App\Models\Finance;
use Filament\Tables\Table;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class FinanceTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Finance Data ';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Finance::query()
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
