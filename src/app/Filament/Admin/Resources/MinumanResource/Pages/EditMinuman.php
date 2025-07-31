<?php

namespace App\Filament\Admin\Resources\MinumanResource\Pages;

use App\Filament\Admin\Resources\MinumanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMinuman extends EditRecord
{
    protected static string $resource = MinumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
