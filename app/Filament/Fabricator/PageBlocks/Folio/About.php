<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;


class About extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.about')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('about.is_active')
                     ->label('Show About Section')
                     ->reactive()
                     ->default(true)
                     ->helperText('Show or hide the About section on the landing Page.'),
             ]),
            Section::make(__('About Section'))
                ->description(__('This section is used to display your About section.'))
                ->collapsible()
                ->collapsed(true)
                ->visible(fn (Get $get) => (bool) ($get('about.is_active') ?? true))
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                        ->schema([
                            Section::make(__('About Section Details'))
                                ->icon('heroicon-o-bars-3-bottom-left')
                                ->collapsed(false)
                                ->schema([
                                FileUpload::make('about.image')
                                    ->label('About Image')
                                    ->image()
                                    ->visibility('public')
                                    ->directory('media/templates/folio/about')
                                    ->columnSpanFull()
                                    ->required(),

                                TextInput::make('about.section_name')
                                    ->label('Section Name')
                                    ->default('About Me')
                                    ->required(),

                                TextInput::make('about.heading')
                                    ->label('Heading 1')
                                    ->default('A bit about')
                                    ->required(),

                                TextInput::make('about.heading2')
                                    ->label('Heading 2')
                                    ->default('who I am')
                                    ->required(),

                                Textarea::make('about.description')
                                    ->label('Description 1')
                                    ->default("I'm Eliott, a freelance designer and frontend developer based in Paris with 5 years of experience shipping digital products for startups, agencies, and scale-ups across Europe. I thrive at the intersection of great design and clean code.")
                                    ->rows(4)
                                    ->columnSpanFull()
                                    ->required(),

                                Textarea::make('about.description2')
                                    ->label('Description 2')
                                    ->default("I believe great interfaces are invisible — they get out of the user's way. My work is fast, accessible and built to last. When I'm not coding, you'll find me hiking or hunting for a good espresso.")
                                    ->rows(4)
                                    ->columnSpanFull()
                                    ->required(),
                                ])->columns(3),
                        Section::make(__('About Skills'))
                                ->description(__('Add your About Skills here'))
                                ->icon('heroicon-o-sparkles')
                                ->collapsed(true)
                            ->schema([
                                Repeater::make('about.skills')
                                    ->label('Skills')
                                    ->schema([
                                        TextInput::make('skill')
                                            ->label('Skill')
                                            ->required(),
                                        TextInput::make('proficiency')
                                            ->label('Proficiency')
                                            ->suffix('%')
                                            ->numeric()
                                            ->required(),
                                    ])
                                    ->default([
                                        ['skill' => 'HTML5 & CSS3', 'proficiency' => 94],
                                        ['skill' => 'Bootstrap', 'proficiency' => 98],
                                        ['skill' => 'TailwindCSS', 'proficiency' => 90],
                                        ['skill' => 'Alpine.js', 'proficiency' => 90],
                                        ['skill' => 'JavaScript', 'proficiency' => 90],
                                        ['skill' => 'Symfony', 'proficiency' => 90],
                                        ['skill' => 'Webflow', 'proficiency' => 90],
                                        ['skill' => 'Figma', 'proficiency' => 90],
                                    ])
                                    ->grid(2)
                                    ->columnSpanFull(),
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
