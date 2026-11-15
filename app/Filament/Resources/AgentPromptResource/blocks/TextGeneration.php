<?php

namespace App\Filament\Resources\AgentPromptResource\Blocks;

use App\Models\AgentPrompt;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\MentionProvider;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class TextGeneration
{
    public static function block(): Block
    {
        return Block::make('text_generation')
            ->label('Text Generation Prompt')
            ->schema([
                Group::make()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Is Actice')
                            ->reactive()
                            ->default(true)
                            ->helperText('Enable or Disbale This Prompt'),
                    ]),
                Section::make('Prompt Settings Section')
                    ->description(__('You define the settings here then you can compose the Final Prompt!'))
                    ->collapsible()
                    ->collapsed(false)
                    ->schema([
                        // Grid::make(4)
                        Group::make()
                            ->schema([

                                Hidden::make('prompt_id')
                                    ->formatStateUsing(function ($state, $set) {
                                        if ($state) {
                                            session(['active_prompt_id' => $state]);
                                        } else {
                                            session()->forget('active_prompt_id');
                                        }
                                    }),

                                RichEditor::make('system_prompt')
                                    ->toolbarButtons([
                                        ['bulletList', 'orderedList', 'codeBlock'],
                                    ])
                                    ->mentions([
                                        MentionProvider::make('@')
                                            ->items(AgentPrompt::getMentionTags()),
                                    ])
                                    ->live(debounce: 500)
                                    ->label('System Prompt')
                                    ->placeholder('Enter System prompt')
                                    ->default('You are a Generalist Expert Copywriter. Your primary goal is to assist the user with [taskType] tasks in a [toneLabel] tone')
                                    ->columnSpanFull()
                                    ->required(),

                                Select::make('task_type')
                                    ->label('Task Type')
                                    ->default('rewrite')
                                    ->options([
                                        'generate' => 'Generate Text',
                                        'summarize' => 'Summarize Text',
                                        'rewrite' => 'Rewrite Text',
                                        'proof_read' => 'Proof Read',
                                    ])
                                    ->live(debounce: 500)
                                    ->columnSpan(2)
                                    ->required(),
                                Select::make('tone')
                                    ->label('Tone')
                                    ->default('casual')
                                    ->placeholder('Select Generation Tone')
                                    ->options([
                                        'professional' => 'Professional',
                                        'casual' => 'Casual',
                                        'funny' => 'Funny',
                                        'persuasive' => 'Persuasive',
                                    ])
                                    ->live(debounce: 500)
                                    ->columnSpan(2)
                                    ->required(),

                                RichEditor::make('task_prompt')
                                    ->toolbarButtons([
                                        ['bulletList', 'orderedList', 'codeBlock'],
                                    ])
                                    ->mentions([
                                        MentionProvider::make('@')
                                            ->items(AgentPrompt::getMentionTags()),
                                    ])
                                    ->live(debounce: 500)
                                    ->label('Task Prompt')
                                    ->default("Your sole task is to rewrite the user's content.")
                                    ->placeholder('Enter Task prompt')
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        FusedGroup::make([
                            Select::make('limit_length_by')
                                ->label('Limit Length By')
                                ->placeholder('Select Length Limit By')
                                ->default('percent')
                                ->options([
                                    'percent' => 'Percentage',
                                    'word' => 'Word',
                                    'sentence' => 'Sentence',
                                    'Paragraph' => 'Paragraph',
                                    'character' => 'Character',
                                ])
                                ->live(debounce: 500)
                                ->afterStateUpdated(function (Set $set, Get $get) {
                                    if ($get('limit_length_by') === 'percent') {
                                        $set('limit_length_min', null);
                                        $set('limit_length_max', null);
                                    } else {
                                        $set('limit_percent', null);
                                        $set('percent_direction', null);
                                    }
                                })
                                ->columnSpan(1)
                                ->required(),

                            TextInput::make('limit_length_min')
                                ->label('Min Length')
                                ->placeholder('Min Length')
                                ->default('200')
                                ->numeric()
                                ->minValue(1)
                                ->maxValue(5000)
                                ->live(debounce: 500)
                                ->columnSpan(1)
                                ->hidden(fn (Get $get) => $get('limit_length_by') === 'percent')
                                ->required(fn (Get $get) => $get('limit_length_by') !== 'percent'),

                            TextInput::make('limit_length_max')
                                ->label('Max Length')
                                ->placeholder('Max Length')
                                ->default('500')
                                ->numeric()
                                ->maxValue(5000)
                                ->live(debounce: 500)
                                ->columnSpan(2)
                                ->hidden(fn (Get $get) => $get('limit_length_by') === 'percent')
                                ->required(fn (Get $get) => $get('limit_length_by') !== 'percent'),

                            Radio::make('percent_direction')
                                ->default('increase')
                                ->options([
                                    'increase' => 'Increase',
                                    'decrease' => 'Decrease',
                                ])
                                ->live(debounce: 500)
                                ->inline()
                                ->columnSpan(2)
                                ->hidden(fn (Get $get) => $get('limit_length_by') !== 'percent')
                                ->required(fn (Get $get) => $get('limit_length_by') === 'percent'),

                            Select::make('limit_percent')
                                ->label('Percentage By')
                                ->placeholder('% By')
                                ->default('10')
                                ->options([
                                    '10' => '10% Percent',
                                    '20' => '20% Percent',
                                    '30' => '30% Percent',
                                    '40' => '40% Percent',
                                    '50' => '50% Percent',
                                    '60' => '60% Percent',
                                ])
                                ->live(debounce: 500)
                                ->columnSpan(1)
                                ->hidden(fn (Get $get) => $get('limit_length_by') !== 'percent')
                                ->required(fn (Get $get) => $get('limit_length_by') === 'percent'),

                        ])->label('Text Generation Limits')->live(debounce: 500)->columns(4),

                        RichEditor::make('constraint_main')
                            ->toolbarButtons([
                                ['bulletList', 'orderedList', 'codeBlock'],
                            ])
                            ->mentions([
                                MentionProvider::make('@')
                                    ->items(AgentPrompt::getMentionTags()),
                            ])
                            ->live(debounce: 500)
                            ->label('Main Constraint')
                            ->default('CRITICAL CONSTRAINTS: You MUST adhere to the following rules: ')
                            ->placeholder('Enter Main Prompt Constraint')
                            ->columnSpanFull()
                            ->required(),

                        Repeater::make('constraints')
                            ->label('Constraints')
                            ->schema([
                                RichEditor::make('constraint')
                                    ->toolbarButtons([
                                        ['bulletList', 'orderedList', 'codeBlock'],
                                    ])
                                    ->mentions([
                                        MentionProvider::make('@')
                                            ->items(AgentPrompt::getMentionTags()),
                                    ])
                                    ->live(debounce: 500)
                                    ->label('Constraint')
                                    ->placeholder('Enter prompt Constraint')
                                    ->columnSpanFull()
                                    ->required(),
                            ])
                            ->default([
                                ['constraint' => 'Maintain factual accuracy without interpretation.'],
                                ['constraint' => 'Use bullet points for multiple key points.'],
                            ]),

                        RichEditor::make('examples')
                            ->toolbarButtons([
                                ['bulletList', 'orderedList', 'codeBlock'],
                            ])
                            ->mentions([
                                MentionProvider::make('@')
                                    ->items(AgentPrompt::getMentionTags()),
                            ])
                            ->live(debounce: 500)
                            ->label('Examples')
                            ->default('Input Example: 500-word blog post -> Output Example: 1000-word blog post')
                            ->placeholder('Enter Footer Prompt Constraint')
                            ->columnSpanFull()
                            ->required(),

                    ])->columnSpan(2),
                Section::make('Final Prompt Composer Section')
                    ->description(__('Here You Can Compose The Final Prompt!'))
                    ->collapsible()
                    ->collapsed(false)
                    ->schema([
                        // Grid::make(4)
                        Group::make()
                            ->schema([
                                // we don't mutate data for system_prompt_final good for reprocessing
                                RichEditor::make('system_prompt_composer')
                                    ->toolbarButtons([
                                        ['bulletList', 'orderedList', 'codeBlock'],
                                    ])
                                    ->mentions([
                                        MentionProvider::make('@')

                                            ->items(AgentPrompt::getMentionTags()),
                                    ])
                                    ->live(debounce: 500)
                                    ->label('System Prompt Composer')
                                    ->placeholder('Use @ to add dynamic tags while you compose the structure of the final system prompt')
                                    ->default('')
                                    ->columnSpanFull(),
                            ]),
                        // we save the final clean output here system_prompt_final
                        MarkdownEditor::make('system_prompt_final')
                            ->live(debounce: 500)
                            ->label('Final System Prompt')
                            ->placeholder('The final system prompt will be rendered here as Markdown then you can fine tune it if needed.')
                            ->toolbarButtons([
                                ['bold', 'italic', 'strike'],
                                ['heading'],
                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                ['table'],
                                ['undo', 'redo'],
                            ]),
                    ])->columnSpan(2),

            ]);
    }
}
