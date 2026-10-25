<?php

namespace App\Filament\Fabricator\PageBlocks\Play;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Guava\IconPicker\Forms\Components\IconPicker;
use Happenv\FilamentTranslatable\Forms\Component\Translations;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Hero extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.hero')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
            ->schema([
                Translations::make('translations')
                    ->prefixLocaleLabel()
                    ->contained(false)
                    ->exclude([
                        'hero.is_active',
                        'hero.image',
                        'hero.button_link',
                        'hero.secondary_button_link',
                        'hero.items_title.title',
                        'hero.items_title.title_link',
                        'hero.items_title.icon',
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                Toggle::make('hero.is_active')
                                    ->default(true)
                                    ->reactive()
                                    ->label(__('Show Hero Section'))
                                    ->helperText(__('Show or hide the Hero section on the landing Page.')),
                            ]),
                        Section::make(__('Hero Section'))
                            ->description(__('This section is used to display your Hero section.'))
                            ->collapsible()
                            ->collapsed(true)
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Section::make(__('Hero Section Details'))
                                            ->icon('heroicon-o-bars-3-bottom-left')
                                            ->collapsed(false)
                                            ->schema([
                                                FileUpload::make('hero.image')
                                                    ->label('Hero Image')
                                                    ->image()
                                                    ->default('templates/play/assets/images/hero/hero-image.jpg')
                                                    ->visibility('public')
                                                    ->directory('templates/media/play/hero'),
                                                TextInput::make('hero.heading')
                                                    ->label(__('Hero Heading'))
                                                    ->default('Providing Brilliant Ideas For Your')
                                                    ->required(),
                                                Textarea::make('hero.description')
                                                    ->label('Description')
                                                    ->default('Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page.')
                                                    ->rows(4)
                                                    ->required(),
                                                TextInput::make('hero.button_text')
                                                    ->label('Primary Button Text')
                                                    ->default('Download Now')
                                                    ->required(),
                                                TextInput::make('hero.button_link')
                                                    ->label('Primary Button Link')
                                                    ->default('#')
                                                    ->required(),
                                                TextInput::make('hero.secondary_button_text')
                                                    ->label('Secondary Button Text')
                                                    ->default('Star on Github')
                                                    ->required(),
                                                TextInput::make('hero.secondary_button_link')
                                                    ->label('Secondary Button Link')
                                                    ->default('#')
                                                    ->required(),
                                            ])->columns(2),
                                    ]),
                                Section::make(__('Hero Items'))
                                    ->description(__('Add your Hero Items'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->schema([
                                        TextInput::make('hero.items_title')
                                            ->label('Hero Items Title')
                                            ->default('Built with latest technology')
                                            ->maxLength(160),
                                        Repeater::make('hero.items')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Item Title')
                                                    ->maxLength(160),

                                                TextInput::make('title_link')
                                                    ->label('Item Title')
                                                    ->maxLength(160),

                                                IconPicker::make('icon')
                                                    ->label('Icon')
                                                    ->columnSpanFull()
                                                    ->searchPrompt('Search icons by name')
                                                    ->closeOnSelect()
                                                    ->required(),
                                            ])->columns(2)
                                            ->default([
                                                [
                                                    'title' => 'Bootstrap',
                                                    'title_link' => 'https://github.com/uideck/play-bootstrap/',
                                                    'icon' => 'devicon-bootstrap',
                                                ],
                                                [
                                                    'title' => 'Tailwind',
                                                    'title_link' => 'https://github.com/TailGrids/play-tailwind/',
                                                    'icon' => 'devicon-tailwindcss',
                                                ],
                                                [
                                                    'title' => 'NodeJs',
                                                    'title_link' => 'https://github.com/NextJSTemplates/play-nextjs',
                                                    'icon' => 'devicon-nodejs',
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
