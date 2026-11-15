<?php

namespace App\Filament\Actions;

use App\Ai\Agents\ContentAgent;
use App\Filament\Resources\AgentPromptResource\Blocks\TextGeneration;
use App\Models\AgentPrompt;
use Closure;
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ContentAction extends Action
{
    protected ?string $blockType = null;

    protected ?string $fieldPath = null;

    public ?array $generated_variants = null;

    /**
     * @param  array<int, string>|Closure  $attributes
     */
    public function attributes(array|Closure $attributes): static
    {
        $this->blockType = $attributes['blockType'] ?? null;
        $this->fieldPath = $attributes['fieldPath'] ?? null;

        return $this;
    }

    public function blockType(string $type): static
    {
        $this->blockType = $type;

        return $this;
    }

    public function fieldPath(string $path): static
    {
        $this->fieldPath = $path;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('Ai Generator'));
        $this->icon(Heroicon::OutlinedPencilSquare);
        $this->slideOver();
        $this->modalWidth(Width::SixExtraLarge);
        $this->stickyModalHeader();

        // We no longer need to manually fetch content here because
        // the Builder component handles its own state.
        $this->mountUsing(function ($form, Model $record, $component) {
            $form->fill([
                'content' => $component->getState(),
                'prompt_id' => null,
                'generated_variants' => null,
                'active_variant_tab' => 'Option 1',
            ]);
        });

        $this->schema([
            Grid::make(4)
                ->schema([
                    Group::make()
                        ->columnSpan(fn (Get $get) => $get('hide_prompt') ? ['lg' => 3] : ['lg' => 2])
                        ->schema([
                            Section::make('Input Context')
                                ->schema([
                                    Select::make('prompt_id')
                                        ->label('Template')
                                        ->placeholder('Select Prompt Template')
                                        ->options(function () {
                                            try {
                                                return AgentPrompt::where('user_id', auth()->id())
                                                    ->pluck('title', 'id')
                                                    ->transform(fn ($item, $key) => $item.' Template');
                                            } catch (\Exception $e) {
                                                return [];
                                            }
                                        })
                                        ->live()
                                        ->afterStateUpdated(function (Set $set, ?string $state) {
                                            if ($state) {
                                                $agentPrompt = AgentPrompt::find($state);
                                                if ($agentPrompt) {
                                                    $set('prompt_blocks', $agentPrompt->prompt_blocks);
                                                }
                                            } else {
                                                $set('prompt_blocks', []);
                                            }
                                        })
                                        ->columnSpan(2)
                                        ->required(),

                                    Toggle::make('hide_prompt')
                                        ->label('Hide Prompt Settings')
                                        ->default(false)
                                        ->inline(false)
                                        ->live()
                                        ->columnSpan(2),

                                    // The 'content' field in this modal filled by $form->fill([
                                    // because the Builder block state doesn't fill it automatically.
                                    Textarea::make('content')
                                        ->label(__('Content to Process'))
                                        ->rows(6)
                                        ->columnSpanFull()
                                        ->required(),

                                    Hidden::make('generated_variants')->default([]),
                                    Hidden::make('active_variant_tab')->default('Option 1'),
                                ])->columns(4),

                            Section::make('AI Generated Variants')
                                ->schema([
                                    Placeholder::make('results_instructions')
                                        ->reactive()
                                        ->hiddenLabel()
                                        ->content(fn (Get $get) => empty($get('generated_variants'))
                                            ? 'Click generate to populate AI variants here.'
                                            : 'Select your preferred version from the buttons below:'),

                                    ToggleButtons::make('active_variant_tab')
                                        ->label('Select Variant')
                                        ->options(function (Get $get) {
                                            $options = [
                                                'Option 1' => 'Option 1',
                                                'Option 2' => 'Option 2',
                                                'Option 3' => 'Option 3',
                                            ];

                                            $selected = $get('active_variant_tab');

                                            if ($selected && array_key_exists($selected, $options)) {
                                                $checkmark = ' ✓ Selected';
                                                $options[$selected] .= $checkmark;
                                            }

                                            return $options;
                                        })
                                        ->default('Option 1')
                                        ->inline()
                                        ->live()
                                        ->columnSpanFull(),

                                    Placeholder::make('active_variant_preview')
                                        ->reactive()
                                        ->hiddenLabel()
                                        ->content(function (Get $get) {
                                            $variants = $get('generated_variants') ?? [];
                                            $selected = $get('active_variant_tab') ?? 'Option 1';

                                            $index = match ($selected) {
                                                'Option 2' => 1,
                                                'Option 3' => 2,
                                                default => 0,
                                            };

                                            return $variants[$index] ?? 'Waiting for generation...';
                                        })
                                        ->columnSpanFull(),

                                    Actions::make([
                                        Action::make('accept')
                                            ->label('Apply Selected Variant')
                                            ->color('success')
                                            ->icon('heroicon-m-check')
                                            ->disabled(fn (Get $get) => empty($get('generated_variants')))
                                            // We use parentAction->schemaContainer->getParentComponent()
                                            // to update source field "without extra calls to refresh the block"
                                            ->action(function (array $mountedActions, Action $parentAction) {
                                                // 1. Get the variants from the modal's state
                                                $parentData = $mountedActions[0]->getRawData();
                                                $variants = $parentData['generated_variants'] ?? [];
                                                $selectedKey = $parentData['active_variant_tab'] ?? 'Option 1';

                                                $selectedIndex = match ($selectedKey) {
                                                    'Option 2' => 1,
                                                    'Option 3' => 2,
                                                    default => 0,
                                                };

                                                if (! empty($variants) && isset($variants[$selectedIndex])) {
                                                    $selectedVariant = $variants[$selectedIndex];

                                                    // Finally!! THE FINAL SOLUTION! No looping over blocks...
                                                    $parentAction->fillData([
                                                        'content' => $selectedVariant, // Updates the modal textarea
                                                    ]);

                                                    // Get the actual Field Component (the Textarea) that triggered this action
                                                    $fieldComponent = $parentAction->schemaContainer->getParentComponent();

                                                    // Update the state of that specific field directly.
                                                    // Filament handles all the nested JSON logic for us!
                                                    $fieldComponent->state($selectedVariant);

                                                    Notification::make()->title('Content Applied')->success()->send();
                                                }
                                            }),
                                    ]),
                                ]),
                        ]),

                    Group::make()
                        ->columnSpan(fn (Get $get) => $get('hide_prompt') ? ['lg' => 1] : ['lg' => 2])
                        ->schema([
                            Section::make('Prompt Settings')
                                ->hidden(fn (Get $get) => (bool) $get('hide_prompt'))
                                ->schema([
                                    Builder::make('prompt_blocks')
                                        ->label('AI Prompt Settings')
                                        ->blocks([
                                            TextGeneration::block(),
                                        ])
                                        ->addable(false),
                                ]),
                        ]),
                ]),
        ]);

        $this->extraModalActions([
            Action::make('generateContent')
                ->label('Generate AI Content')
                ->color('info')
                ->icon('heroicon-m-sparkles')
                ->action(function (array $data, Action $parentAction, $component, Model $record) {

                    $parentData = $parentAction->getRawData();

                    $promptTemplate = AgentPrompt::find($parentData['prompt_id'] ?? null);
                    if (! $promptTemplate) {
                        Notification::make()->title('Invalid Template')->danger()->send();

                        return;
                    }

                    $promptData = $promptTemplate->prompt_blocks[0]['data'];

                    $rewriterPayload = [
                        'instructions' => $promptData['system_prompt_final'],
                        'user_id' => auth()->id(),
                    ];

                    // IMPORTANT! to trim the content before sending
                    $source_content = trim($component->getState());

                    try {
                        $agent = new ContentAgent($rewriterPayload);
                        $response = $agent->prompt("Please process the following content:\n\n".($source_content ?? ''));
                        $variants = $response['options'] ?? [];

                        if (empty($variants)) {
                            $variants = ['Generation failed to produce variants.', 'Variant 2', 'Variant 3'];
                        }

                        // Update the form state so the UI reacts immediately
                        $parentAction->fillData([
                            'generated_variants' => $variants,
                            'active_variant_tab' => 'Option 1',
                        ]);

                        Notification::make()->title('Variants Generated!')->success()->send();

                    } catch (\Exception $e) {
                        Log::error('AI Generation Error: '.$e->getMessage());
                        Notification::make()->title('Generation Failed')->danger()->send();
                    }
                }),
        ]);
    }
}
