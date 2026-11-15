<?php

namespace App\Filament\Resources\AgentPromptResource\Pages;

use App\Filament\Resources\AgentPromptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgentPrompts extends ListRecords
{
    protected static string $resource = AgentPromptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
