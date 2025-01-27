<?php

namespace App\Filament\Resources\HRMResource\Pages;

use App\Filament\Resources\HRMResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHRMS extends ListRecords
{
    protected static string $resource = HRMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
