<?php

namespace App\Filament\Resources\BankingChannelResource\Pages;

use App\Filament\Resources\BankingChannelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBankingChannel extends EditRecord
{
    protected static string $resource = BankingChannelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
