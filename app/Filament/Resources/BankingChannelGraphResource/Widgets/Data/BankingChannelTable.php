<?php

namespace App\Filament\Resources\BankingChannelGraphResource\Widgets\Data;

use Filament\Tables;
use App\Models\BankingChannel;
use Filament\Tables\Table;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class BankingChannelTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Banking Channel Data ';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                BankingChannel::query()
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
