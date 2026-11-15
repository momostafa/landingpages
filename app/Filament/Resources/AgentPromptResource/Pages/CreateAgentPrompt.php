<?php

namespace App\Filament\Resources\AgentPromptResource\Pages;

use App\Filament\Resources\AgentPromptResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAgentPrompt extends CreateRecord
{
    protected static string $resource = AgentPromptResource::class;

    protected function handleRecordCreation(array $data): Model
    {

        $model = static::getModel()::create($data);

        if (isset($data['prompt_blocks'][0]['data']['prompt_id'])) {
            $data['prompt_blocks'][0]['data']['prompt_id'] = $model->id;
        }

        return $model;

    }
}
