<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BankingChannel;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use App\Models\DescriptionList;
use App\Filament\Resources\BankingChannelResource\Pages;


class BankingChannelResource extends Resource
{
    protected static ?string $model = BankingChannel::class;

    protected static ?string $navigationLabel = "Banking Channel Data";
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-device-phone-mobile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('description')
                    ->label('Description') // Optional: Customize the label if needed
                    ->options(DescriptionList::where('department', 'mpay')->pluck('description', 'description')) // Fetch descriptions with department = "finance"
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('data')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('date', 'desc')
            ->defaultSort('description', 'asc')
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
            'index' => Pages\ListBankingChannels::route('/'),
            'create' => Pages\CreateBankingChannel::route('/create'),
            'edit' => Pages\EditBankingChannel::route('/{record}/edit'),
        ];
    }
}
