<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Guava\IconPicker\Forms\Components\IconPicker;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Services extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.services')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('services.is_active')
                     ->label('Show Services Section')
                     ->reactive()
                     ->default(true)
                     ->helperText('Show or hide the Services section on the landing Page.'),
             ]),
            Section::make(__('Services Section'))
                ->description(__('This section is used to display your Services section.'))
                ->collapsible()
                ->collapsed(true)
                ->icon('heroicon-o-photo')
                ->visible(fn (Get $get) => (bool) ($get('services.is_active') ?? true))
                ->schema([
                    Group::make()
                        ->schema([
                            Section::make(__('Services Section Details'))
                                ->icon('heroicon-o-bars-3-bottom-left')
                                ->collapsed(false)
                                ->schema([
                                    TextInput::make('services.heading')
                                        ->label(__('Services Section Header'))
                                        ->default('SERVICES')
                                        ->placeholder(__('SERVICES'))
                                        ->maxLength(140),
                                    TextInput::make('services.section_name')
                                        ->label(__('Services Section Name'))
                                        ->default('My Services')
                                        ->placeholder(__('My Services'))
                                        ->maxLength(140),
                                    Textarea::make('services.description')
                                        ->label(__('Services Section Description'))
                                        ->default('I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute')
                                        ->placeholder(__('Description for Services Section'))
                                        ->maxLength(140),
                                ]),
                            Section::make(__('Services Items'))
                                ->description(__('Add your Services'))
                                ->icon('heroicon-o-sparkles')
                                ->collapsed(true)
                               // ->columns(3)
                                ->schema([
                                    Repeater::make('services.items')
                                        ->schema([
                                            TextInput::make('number')
                                                ->label('Service Number'),
                                            TextInput::make('title')
                                                ->label('Service Title')
                                                ->required(),
                                            Textarea::make('description')
                                                ->label('Service Description')
                                                ->required(),
                                            IconPicker::make('icon')
                                                ->label('Service Icon')
                                                // ->columns(2)
                                                //->sets(['heroicons'])
                                                // ->columnSpanFull()
                                                ->searchPrompt('Search icons by name')
                                                ->closeOnSelect(),
                                            FileUpload::make('image')
                                                ->label('Service Image')
                                                ->image()
                                                ->visibility('public')
                                                ->directory('templates/folio/services'),
                                        ])->columns(2)
                                        ->default([
                                            [
                                                'number' => '01',
                                                'title' => 'UI/UX Design',
                                                'description' => 'I design products that are more than pretty. I make them shippable.',
                                                'icon' => 'gmdi-design-services-o',
                                                'image' => []
                                            ],
                                            [
                                                'number' => '02',
                                                'title' => 'Web Development',
                                                'description' => 'I design products that are more than pretty. I make them shippable.',
                                                'icon' => 'gmdi-web-o',
                                                'image' => []
                                            ],
                                            [
                                                'number' => '03',
                                                'title' => 'SEO / Marketing',
                                                'description' => 'I design products that are more than pretty. I make them shippable.',
                                                'icon' => 'heroicon-o-rocket-launch',
                                                'image' => []
                                            ],

                                            [
                                                'number' => '04',
                                                'title' => 'Branding & Strategy',
                                                'description' => 'I design products that are more than pretty. I make them shippable.',
                                                'icon' => 'heroicon-m-megaphone',
                                                'image' => []
                                            ]
                                        ]),

                                    ])


                        ]),
                ]),

        ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
