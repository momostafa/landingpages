<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgentPromptResource\Blocks\TextGeneration;
use App\Filament\Resources\AgentPromptResource\Pages\CreateAgentPrompt;
use App\Filament\Resources\AgentPromptResource\Pages\EditAgentPrompt;
use App\Filament\Resources\AgentPromptResource\Pages\ListAgentPrompts;
use App\Models\AgentPrompt;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AgentPromptResource extends Resource
{
    protected static ?string $model = AgentPrompt::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->columns(3)->components([
            Group::make()
                ->columnSpan(2)
                ->schema([
                    Section::make('Agent Prompt Blocks')
                        ->schema([
                            Builder::make('prompt_blocks')
                                ->blocks([
                                    TextGeneration::block(),
                                ])
                                ->collapsible()
                                ->collapsed(false)
                                ->live(),
                        ]),
                ]),

            Group::make()
                ->columnSpan(1)
                ->schema([
                    Section::make()
                        ->schema([
                            Hidden::make('id'),

                            Hidden::make('user_id')
                                ->default(auth()->id())
                                ->formatStateUsing(fn ($state) => $state ?? auth()->id()),

                            TextInput::make('title')
                                ->label('Prompt Title')
                                ->required(),

                            TextInput::make('description')
                                ->label('Brief Description')
                                ->required(),

                            Select::make('content_type')
                                ->label('Content Type')
                                ->default('text')
                                ->options([
                                    'text' => 'Text',
                                    'image' => 'Image',
                                    'tts' => 'TTS Text To Speech',
                                    'stt' => 'STT Speech To Text',
                                ])
                                ->required(),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('content_type')->searchable()->sortable(),
                TextColumn::make('description')->searchable()->sortable(),
                TextColumn::make('updated_at')->dateTime()->label('Updated'),
            ])
            ->filters([
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAgentPrompts::route('/'),
            'create' => CreateAgentPrompt::route('/create'),
            'edit' => EditAgentPrompt::route('/{record}/edit'),
        ];
    }
}
