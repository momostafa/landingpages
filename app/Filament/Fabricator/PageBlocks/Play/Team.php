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

class Team extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.team')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
            ->schema([
                Translations::make('translations')
                    ->prefixLocaleLabel()
                    ->contained(false)
                    ->exclude([
                        'team.is_active',
                        'team.items.title_link',
                        'team.items.image',
                        'team.social_links.icon',
                        'team.social_links.link',
                        'team.clients.image',
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                Toggle::make('team.is_active')
                                    ->default(true)
                                    ->reactive()
                                    ->label(__('Show Team Section'))
                                    ->helperText(__('Show or hide the team section on the landing Page.')),
                            ]),
                        Section::make(__('Team Section'))
                            ->description(__('This section is used to display your Team section.'))
                            ->collapsible()
                            ->collapsed(true)
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        TextInput::make('team.section_title')
                                            ->label('Team Title')
                                            ->default('Team')
                                            ->required(),

                                        TextInput::make('team.heading')
                                            ->label('Team Heading')
                                            ->default('Our Creative Team')
                                            ->required(),

                                        Textarea::make('team.description')
                                            ->label('Team Description')
                                            ->default('There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form.')
                                            ->rows(3)
                                            ->required(),

                                        Repeater::make('team.items')
                                            ->label('Team Items')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),

                                                TextInput::make('title_link')
                                                    ->label('Title Link')
                                                    ->required(),

                                                TextInput::make('name')
                                                    ->label('Name')
                                                    ->required(),

                                                FileUpload::make('image')
                                                    ->label('Image')
                                                    ->image()
                                                    ->visibility('public')
                                                    ->directory('templates/media/team')
                                                    ->required(),
                                            ])
                                            ->default([
                                                [
                                                    'image' => ['templates/play/assets/images/team/team-01.png'],
                                                    'name' => 'Calvin Carlo',
                                                    'title' => 'Designer',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'image' => ['templates/play/assets/images/team/team-02.png'],
                                                    'name' => 'Aliana Rosy',
                                                    'title' => 'Designer',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'image' => ['templates/play/assets/images/team/team-03.png'],
                                                    'name' => 'Sofia Razaq',
                                                    'title' => 'Designer',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'image' => ['templates/play/assets/images/team/team-04.png'],
                                                    'name' => 'Micheal Carlo',
                                                    'title' => 'Designer',
                                                    'title_link' => '#',
                                                ],
                                            ])
                                            ->grid(2)
                                            ->collapsible()
                                            ->columnSpanFull(),

                                        Repeater::make('team.social_links')
                                            ->label('Social Links')
                                            ->schema([
                                                IconPicker::make('icon')
                                                    ->label('Icon')
                                                    ->columnSpanFull()
                                                    ->searchPrompt('Search icons by name')
                                                    ->closeOnSelect()
                                                    ->required(),

                                                TextInput::make('link')
                                                    ->label('Link')
                                                    ->required(),
                                            ])
                                            ->default([
                                                [
                                                    'icon' => 'uni-facebook-f-o',
                                                    'link' => '#',
                                                ],
                                                [
                                                    'icon' => 'uni-instagram-o',
                                                    'link' => '#',
                                                ],
                                                [
                                                    'icon' => 'uni-twitter-o',
                                                    'link' => '#',
                                                ],
                                            ])
                                            ->grid(2)
                                            ->collapsible()
                                            ->columnSpanFull(),

                                        Repeater::make('team.counters')
                                            ->label('Counters')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Number')
                                                    ->numeric()
                                                    ->required(),
                                                TextInput::make('target')
                                                    ->label('Target')
                                                    ->required(),
                                                TextInput::make('symbol')
                                                    ->label('Symbol')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),
                                            ])
                                            ->default([
                                                [
                                                    'number' => '3',
                                                    'target' => '40',
                                                    'symbol' => '+',
                                                    'title' => 'Projects',
                                                ],
                                                [
                                                    'number' => '1',
                                                    'target' => '200',
                                                    'symbol' => '+',
                                                    'title' => 'Clients',
                                                ],
                                                [
                                                    'number' => '200',
                                                    'target' => '457',
                                                    'symbol' => 'K',
                                                    'title' => 'Members',
                                                ],
                                                [
                                                    'number' => '100',
                                                    'target' => '150',
                                                    'symbol' => '+',
                                                    'title' => 'Employee',
                                                ],
                                            ])
                                            ->grid(2)
                                            ->collapsible()
                                            ->columnSpanFull(),

                                        Repeater::make('team.clients')
                                            ->label('Clients')
                                            ->schema([
                                                TextInput::make('alt')
                                                    ->label('Alt')
                                                    ->required(),

                                                FileUpload::make('image')
                                                    ->label('Image')
                                                    ->image()
                                                    ->visibility('public')
                                                    ->directory('templates/media/clients')
                                                    ->required(),
                                            ])
                                            ->default([
                                                [
                                                    'image' => ['templates/play/assets/images/client/amazon.svg'],
                                                    'alt' => 'Amazon',
                                                ],
                                                [
                                                    'image' => ['templates/play/assets/images/client/google.svg'],
                                                    'alt' => 'Google',
                                                ],
                                                [
                                                    'image' => ['templates/play/assets/images/client/lenovo.svg'],
                                                    'alt' => 'Lenovo',
                                                ],
                                                [
                                                    'image' => ['templates/play/assets/images/client/paypal.svg'],
                                                    'alt' => 'Paypal',
                                                ],
                                                [
                                                    'image' => ['templates/play/assets/images/client/shopify.svg'],
                                                    'alt' => 'Shopify',
                                                ],
                                                [
                                                    'image' => ['templates/play/assets/images/client/whatsapp.svg'],
                                                    'alt' => 'Whatsapp',
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
