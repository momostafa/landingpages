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
use Happenv\FilamentTranslatable\Forms\Component\Translations;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Brands extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.brands')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
            ->schema([
                Translations::make('translations')
                    ->prefixLocaleLabel()
                    ->contained(false)
                    ->exclude([
                        'brands.is_active',
                        'brands.logos.image_light',
                        'brands.logos.image_dark',
                        'brands.logos.alt',
                        'brands.logos.link',
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                Toggle::make('brands.is_active')
                                    ->default(true)
                                    ->reactive()
                                    ->label(__('Show Brands Section'))
                                    ->helperText(__('Show or hide the brands section on the landing Page.')),
                            ]),
                        Section::make(__('Brands Section'))
                            ->description(__('This section is used to display your Brands section.'))
                            ->collapsible()
                            ->collapsed(true)
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        TextInput::make('brands.section_title')
                                            ->label('Brands Title')
                                            ->default('Brands')
                                            ->required(),

                                        TextInput::make('brands.heading')
                                            ->label('Brands Heading')
                                            ->default('Our Works & Projects')
                                            ->required(),

                                        Textarea::make('brands.description')
                                            ->label('Brands Description')
                                            ->default('Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page')
                                            ->rows(3)
                                            ->required(),
                                        Repeater::make('brands.logos')
                                            ->label('Logos')
                                            ->schema([
                                                TextInput::make('alt')
                                                    ->label('Alt')
                                                    ->required(),

                                                FileUpload::make('image_light')
                                                    ->label('Image (Light Mode)')
                                                    ->image()
                                                    ->visibility('public')
                                                    ->directory('templates/media/brands')
                                                    ->required(),
                                                FileUpload::make('image_dark')
                                                    ->label('Image (Dark Mode)')
                                                    ->image()
                                                    ->visibility('public')
                                                    ->directory('templates/media/brands')
                                                    ->required(),
                                                TextInput::make('link')
                                                    ->label('Link'),
                                            ])
                                            ->default([
                                                [
                                                    'image_light' => ['templates/play/assets/images/brands/ayroui.svg'],
                                                    'image_dark' => ['templates/play/assets/images/brands/ayroui-white.svg'],
                                                    'alt' => 'Ayroui',
                                                    'link' => '#',
                                                ],
                                                [
                                                    'image_light' => ['templates/play/assets/images/brands/graygrids.svg'],
                                                    'image_dark' => ['templates/play/assets/images/brands/graygrids-white.svg'],
                                                    'alt' => 'Graygrids',
                                                    'link' => '#',
                                                ],
                                                [
                                                    'image_light' => ['templates/play/assets/images/brands/lineicons.svg'],
                                                    'image_dark' => ['templates/play/assets/images/brands/lineicons-white.svg'],
                                                    'alt' => 'Lineicons',
                                                    'link' => '#',
                                                ],
                                                [
                                                    'image_light' => ['templates/play/assets/images/brands/uideck.svg'],
                                                    'image_dark' => ['templates/play/assets/images/brands/uideck-white.svg'],
                                                    'alt' => 'Uideck',
                                                    'link' => '#',
                                                ],
                                                [
                                                    'image_light' => ['templates/play/assets/images/brands/tailgrids.svg'],
                                                    'image_dark' => ['templates/play/assets/images/brands/tailgrids-white.svg'],
                                                    'alt' => 'Tailgrids',
                                                    'link' => '#',
                                                ],
                                            ])
                                            ->grid(2)
                                            ->collapsible()
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
