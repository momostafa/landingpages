<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Rating;
use Filament\Forms\Components\TagsInput;


class Resume extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.resume')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('resume.is_active')
                     ->label('Show Resume Section')
                     ->reactive()
                     ->default(true)
                     ->helperText('Show or hide the Resume section on the landing Page.'),
             ]),
            Section::make(__('Resume Section'))
                ->description(__('This section is used to display your Resume section.'))
                ->collapsible()
                ->collapsed(true)
                ->visible(fn (Get $get) => (bool) ($get('resume.is_active') ?? true))
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                        ->schema([
                            Section::make(__('Resume Section Details'))
                                ->icon('heroicon-o-bars-3-bottom-left')
                                ->collapsed(false)
                                ->schema([
                                    TextInput::make('resume.section_header')
                                        ->label(__('Resume Section Header'))
                                        ->default('RESUME')
                                        ->placeholder(__('RESUME'))
                                        ->maxLength(140),
                                ]),
                            Section::make(__('Work Experience Details'))
                                ->description(__('Add your Work Experience Details'))
                                ->icon('heroicon-o-sparkles')
                                ->collapsed(true)
                                ->schema([
                                TextInput::make('resume.experience_header')
                                    ->label(__('Work Experience Header'))
                                    ->default('Work Experience')
                                    ->placeholder(__('Work Experience'))
                                    ->maxLength(140),
                                Textarea::make('resume.experience_description')
                                    ->label(__('Resume Section Description'))
                                    ->default('I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute')
                                    ->placeholder(__('Description for Work Experience Section'))
                                    ->maxLength(140),
                                    Repeater::make('resume.experience')
                                        ->schema([
                                            TextInput::make('company')
                                                ->label('Company Name')
                                                ->maxLength(160),
                                            TextInput::make('period')
                                                ->label('Period')
                                                ->maxLength(160),
                                            TextInput::make('position')
                                                ->label('Job Position')
                                                ->maxLength(160),
                                            Textarea::make('description')
                                                ->label('Job Description')
                                                ->maxLength(160),
                                        ])
                                        ->columns(2)
                                        ->default([
                                            [
                                                'company' => 'Microsfot Inc.',
                                                'period' => 'Mar, 2022 - Current',
                                                'position' => 'Lead UX Designer',
                                                'description' => 'Owing to advancements in product other designer technologies aute voluptate.'
                                            ],
                                            [
                                                'company' => 'Google',
                                                'period' => '2018 - 2022',
                                                'position' => 'UX Designer',
                                                'description' => 'Owing to advancements in product other designer technologies aute voluptate.'
                                            ],
                                            [
                                                'company' => 'Apple',
                                                'period' => '2014-2018',
                                                'position' => 'Human Interface Designer',
                                                'description' => 'Owing to advancements in product other designer technologies aute voluptate.'
                                            ]
                                        ]),
                                    ]),
                            Section::make(__('Education Details'))
                                ->description(__('Add your Education Details'))
                                ->icon('heroicon-o-sparkles')
                                ->collapsed(true)
                               // ->columns(3)
                                ->schema([
                                    TextInput::make('resume.education_header')
                                        ->label('Education Section Header')
                                        ->maxLength(160),
                                    Textarea::make('resume.education_description')
                                        ->label('Education Section Description')
                                        ->maxLength(160),
                                    Repeater::make('resume.education')
                                        ->schema([
                                            TextInput::make('school')
                                                ->label('School Name')
                                                ->maxLength(160),
                                            TextInput::make('period')
                                                ->label('Period')
                                                ->maxLength(160),
                                            TextInput::make('degree')
                                                ->label('Degree')
                                                ->maxLength(160),
                                            Textarea::make('description')
                                                ->label('Description')
                                                ->maxLength(160),
                                        ])
                                        ->columns(2)
                                        ->default([
                                            [
                                                'school' => 'University of Toronto',
                                                'period' => '2014-2018',
                                                'degree' => 'Bachelor of Science in Computer Science',
                                                'description' => 'Owing to advancements in product other designer technologies aute voluptate.'
                                            ],
                                            [
                                                'school' => 'University of Toronto',
                                                'period' => '2014-2018',
                                                'degree' => 'Bachelor of Science in Computer Science',
                                                'description' => 'Owing to advancements in product other designer technologies aute voluptate.'
                                            ],
                                            [
                                                'school' => 'University of Toronto',
                                                'period' => '2014-2018',
                                                'degree' => 'Bachelor of Science in Computer Science',
                                                'description' => 'Owing to advancements in product other designer technologies aute voluptate.'
                                            ]
                                        ]),
                                    ]),


                        ]),
                ]),

        ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
