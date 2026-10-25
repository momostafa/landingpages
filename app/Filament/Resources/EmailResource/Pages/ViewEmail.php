<?php

namespace App\Filament\Resources\EmailResource\Pages;

use App\Filament\Resources\EmailResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEmail extends ViewRecord
{
    protected static string $resource = EmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // EditAction::make(),
        ];
    }
}
