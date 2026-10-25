<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Hero extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.hero')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
            ->schema([
                Group::make()
                    ->schema([
                        Toggle::make('hero.is_active')
                            ->label('Show Hero Section')
                            ->reactive()
                            ->default(true)
                            ->helperText('Show or hide the Hero section on the landing Page.'),
                    ]),
                Section::make(__('Hero Section'))
                    ->description(__('This section is used to display your Hero section.'))
                    ->collapsible()
                    ->collapsed(true)
                    ->visible(fn (Get $get) => (bool) ($get('hero.is_active') ?? true))
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Group::make()
                            ->schema([
                                Section::make(__('Hero Section Details'))
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->collapsed(false)
                                    ->schema([
                                        TextInput::make('hero.section_name')
                                            ->label(__('Hero Section Name'))
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Portfolio'))
                                            ->maxLength(140),
                                        TextInput::make('hero.h1_part1')
                                            ->label('Hero H1 Part 1')
                                            ->default('I Craft The')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('I Craft The'))
                                            ->maxLength(160),
                                        TextInput::make('hero.h1_part2')
                                            ->label('Hero H1 Part 2')
                                            ->default('Digital Landscape')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Digital Landscape'))
                                            ->maxLength(160),
                                        TextInput::make('hero.text_part1')
                                            ->label('Hero Text Part 1')
                                            ->default('I am a')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('I am a'))
                                            ->maxLength(160),
                                        TextInput::make('hero.text_part2')
                                            ->label('Hero Text Part 2')
                                            ->default('Frontend Developer')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Frontend Developer'))
                                            ->maxLength(160),
                                        TextInput::make('hero.text_part3')
                                            ->label('Hero Text Part 3')
                                            ->default('at heart and, i create features that are best suited for the job at hand.')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('at heart and, i create features that are best suited for the job at hand.'))
                                            ->maxLength(255),
                                    ])->columns(3),

                                Section::make(__('Hero Image'))
                                    ->description(__('Avatar or Logo for your Hero Section.'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->columns(3)
                                    ->schema([
                                        FileUpload::make('hero.avatarlight')
                                            ->label('Light - Hero Avatar')
                                            ->default('templates/folio/assets/img/hero/user_thumb.png')
                                            ->directory('templates/media/hero')
                                            ->maxSize(10000)
                                            ->image()
                                            ->visibility('public')
                                            ->columnSpan(2)
                                            ->imageEditor()
                                            ->helperText(__('This is your avatar or logo for your Hero Section.')),
                                        FileUpload::make('hero.avatardark')
                                            ->label('Dark - Hero Avatar')
                                            ->default('templates/folio/assets/img/hero/user_thumb.png')
                                            ->directory('templates/media/hero')
                                            ->maxSize(10000)
                                            ->image()
                                            ->visibility('public')
                                            ->columnSpan(2)
                                            ->imageEditor()
                                            ->helperText(__('This is your avatar or logo for your Hero Section.')),
                                    ]),

                                Section::make('Availablity')
                                    ->description(__('Availablity for your Hero Section.'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->columns(3)
                                    ->schema([
                                        TextInput::make('hero.availablity1')
                                            ->label('Availablity 1')
                                            ->default('Available for work')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Available for work'))
                                            ->maxLength(160),
                                        TextInput::make('hero.availablity2')
                                            ->label('Availablity 2')
                                            ->default('Full Time Job')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Full Time Job'))
                                            ->maxLength(160),
                                        TextInput::make('hero.button_text')
                                            ->label('Button Text')
                                            ->default('Hire Me')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Hire Me'))
                                            ->maxLength(160),
                                        TextInput::make('hero.button_link')
                                            ->label('Button Link')
                                            ->default('#contact')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('#contact'))
                                            ->maxLength(160),
                                    ])->columns(2),

                                Section::make('Partners / Clients Logo Slider')
                                    ->description(__('Upload your Partners / Clients Logo Slider for your Hero Section.'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                   // ->columns(2)
                                    ->schema([
                                        TextInput::make('hero.slider_title')
                                            ->label('Title')
                                            ->default('Trusted Partners')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Partners / Clients'))
                                            ->maxLength(160),
                                        Repeater::make('hero.partners')
                                            ->label('Partners')
                                            ->schema([
                                                FileUpload::make('logo')
                                                    ->label('Logo')
                                                    ->directory('templates/media/hero/partners')
                                                    ->maxSize(10000)
                                                    ->image()
                                                    ->visibility('public')
                                                    ->imageEditor()
                                                    ->helperText(__('Upload your Partners / Clients Logo Slider for your Hero Section.'))
                                                    ->columnSpanFull(),
                                                TextInput::make('name')
                                                    ->label('Name')
                                                    ->placeholder('Adobe Ltd.')
                                                    ->maxLength(160),
                                                TextInput::make('link')
                                                    ->label('Link')
                                                    ->placeholder('https://example.com')
                                                    ->maxLength(160),
                                            ])
                                            ->columns(2)
                                            ->default([
                                                [
                                                    'logo' => ['templates/folio/assets/img/partners/logo1.svg'],
                                                    'name' => 'Adobaco Ltd.',
                                                    'link' => 'https://example.com',
                                                ],
                                                [
                                                    'logo' => ['templates/folio/assets/img/partners/logo2.svg'],
                                                    'name' => 'Poppers Ltd.',
                                                    'link' => 'https://example.com',
                                                ],
                                                [
                                                    'logo' => ['templates/folio/assets/img/partners/logo3.svg'],
                                                    'name' => 'Octopus Ltd.',
                                                    'link' => 'https://example.com',
                                                ],
                                                [
                                                    'logo' => ['templates/folio/assets/img/partners/logo4.svg'],
                                                    'name' => 'Dulalix Ltd.',
                                                    'link' => 'https://example.com',
                                                ],
                                                [
                                                    'logo' => ['templates/folio/assets/img/partners/logo2.svg'],
                                                    'name' => 'Poppers Ltd.',
                                                    'link' => 'https://example.com',
                                                ],
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
