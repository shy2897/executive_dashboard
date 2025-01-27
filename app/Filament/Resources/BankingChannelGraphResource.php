<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BankingChannelGraphResource\Pages;
use App\Filament\Resources\BankingChannelGraphResource\RelationManagers;
use App\Models\BankingChannelGraph;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BankingChannelGraphResource extends Resource
{
    protected static ?string $model = BankingChannelGraph::class;

    protected static ?string $navigationLabel = "Banking Channel";
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\BankingChannelGraphs::route('/'),
            'yearly-banking-channel-graph' => Pages\YearlyBankingChannelGraph::route('/yearly-banking-channel-graph'),
            'filtered-banking-channel-graph' => Pages\FilteredBankingChannelGraph::route('/filtered-banking-channel-graph'),
            'banking-channel-view-detail-data' => Pages\BankingChannelData::route('/banking-channel-view-detail-data'),
        ];
    }
}
