<?php

namespace App\Filament\Resources\HRMResource\Pages;

use App\Filament\Resources\HRMResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHRM extends EditRecord
{
    protected static string $resource = HRMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
