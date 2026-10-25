<?php

namespace App\Filament\Fabricator\PageBlocks\Play;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Happenv\FilamentTranslatable\Forms\Component\Translations;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Pricing extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.pricing')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
            ->schema([
                Translations::make('translations')
                    ->prefixLocaleLabel()
                    ->contained(false)
                    ->exclude([
                        'pricing.is_active',
                        'pricing.items.button_link',
                        'pricing.items.features.icon',
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                Toggle::make('pricing.is_active')
                                    ->default(true)
                                    ->reactive()
                                    ->label(__('Show Pricing Section'))
                                    ->helperText(__('Show or hide the pricing section on the landing Page.')),
                            ]),
                        Section::make(__('Pricing Section'))
                            ->description(__('This section is used to display your Pricing section.'))
                            ->collapsible()
                            ->collapsed(true)
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        TextInput::make('pricing.section_title')
                                            ->label('Pricing Title')
                                            ->default('Pricing')
                                            ->required(),

                                        TextInput::make('pricing.heading')
                                            ->label('Pricing Heading')
                                            ->default('Comfortable Rates')
                                            ->required(),

                                        Textarea::make('pricing.description')
                                            ->label('Pricing Description')
                                            ->default('Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page')
                                            ->rows(3)
                                            ->required(),

                                        Textarea::make('pricing.footer_text')
                                            ->label('Pricing Footer Text')
                                            ->default('No credit card required')
                                            ->rows(3)
                                            ->required(),

                                        Repeater::make('pricing.items')
                                            ->label('Pricing Items')
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label('Name')
                                                    ->required(),

                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),

                                                TextInput::make('price')
                                                    ->label('Price')
                                                    ->numeric()
                                                    ->required(),

                                                TextInput::make('button_text')
                                                    ->label('Button Text')
                                                    ->required(),

                                                TextInput::make('button_link')
                                                    ->label('Button Link')
                                                    ->required(),

                                                Repeater::make('features')
                                                    ->label('Features')
                                                    ->schema([
                                                        TextInput::make('icon')
                                                            ->label('Icon')
                                                            // ->dropdown(false)
                                                            // ->sets(['heroicons'])
                                                            ->required(),

                                                        TextInput::make('feature')
                                                            ->label('Feature')
                                                            ->required()
                                                            ->columnSpanFull(),
                                                    ])
                                                    ->default([
                                                        [
                                                            'icon' => 'uni-check-circle-o',
                                                            'feature' => 'Complete documentation',
                                                        ],
                                                        [
                                                            'icon' => 'uni-check-circle-o',
                                                            'feature' => 'Working materials in Figma',
                                                        ],
                                                        [
                                                            'icon' => 'uni-check-circle-o',
                                                            'feature' => '100GB cloud storage',
                                                        ],
                                                        [
                                                            'icon' => 'uni-check-circle-o',
                                                            'feature' => '500 team members',
                                                        ],
                                                    ])
                                                    ->grid(2)
                                                    ->columnSpanFull(),
                                            ])
                                            ->default([
                                                [
                                                    'name' => 'Basic',
                                                    'price' => '10',
                                                    'title' => 'Basic features for up to 10 users.',
                                                    'button_text' => 'Signup Now',
                                                    'button_link' => '#',
                                                ],
                                                [
                                                    'name' => 'Business',
                                                    'price' => '99',
                                                    'title' => 'Basic features for up to 30 users.',
                                                    'button_text' => 'Signup Now',
                                                    'button_link' => '#',
                                                ],
                                                [
                                                    'name' => 'Professional',
                                                    'price' => '299',
                                                    'title' => 'Basic features for up to 100 users.',
                                                    'button_text' => 'Signup Now',
                                                    'button_link' => '#',
                                                ],
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
