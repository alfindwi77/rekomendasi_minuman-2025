<?php

namespace App\Filament\Admin\Resources\MinumanResource\Pages;

use App\Filament\Admin\Resources\MinumanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMinumen extends ListRecords
{
    protected static string $resource = MinumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
