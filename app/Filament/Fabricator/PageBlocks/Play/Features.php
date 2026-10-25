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

class Features extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.features')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
            ->schema([
                // exclude only not translatable fields e.g icons, links, image links
                // Don't exclude button_text etc...
                Translations::make('translations')
                    ->prefixLocaleLabel()
                    ->contained(false)
                    ->exclude([
                        'features.is_active',
                        'features.items.icon',
                        'features.items.button_link',
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                Toggle::make('features.is_active')
                                    ->default(true)
                                    ->reactive()
                                    ->label(__('Show Features Section'))
                                    ->helperText(__('Show or hide the Features section on the landing Page.')),
                            ]),
                        Section::make(__('Features Section'))
                            ->description(__('This section is used to display your Features section.'))
                            ->collapsible()
                            ->collapsed(true)
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        TextInput::make('features.section_title')
                                            ->label('Section Title')
                                            ->default('What We Do ?')
                                            ->required(),

                                        TextInput::make('features.heading')
                                            ->label('Heading')
                                            ->default('Perfect Solution For Your Business')
                                            ->required(),

                                        Textarea::make('features.description')
                                            ->label('Description')
                                            ->default('Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page.')
                                            ->rows(4)
                                            ->required(),

                                        Repeater::make('features.items')
                                            ->label('Features Items')
                                            ->schema([
                                                TextInput::make('icon')
                                                    ->label('Select Icon')
                                                    // ->dropdown(false)
                                                    // ->sets(['heroicons'])
                                                    ->required(),

                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),

                                                TextInput::make('title_link')
                                                    ->label('Title Link')
                                                    ->required(),

                                                Textarea::make('description')
                                                    ->label('Description')
                                                    ->rows(3)
                                                    ->required(),

                                                TextInput::make('button_text')
                                                    ->label('Button Text')
                                                    ->required(),

                                                TextInput::make('button_link')
                                                    ->label('Button Link'),
                                            ])
                                            ->default([
                                                [
                                                    'icon' => 'uni-adjust-circle-o',
                                                    'title' => 'Grow Your Business',
                                                    'title_link' => '#',
                                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                                    'button_text' => 'Read More',
                                                    'button_link' => '#',
                                                ],
                                                [
                                                    'icon' => 'uni-circuit-o',
                                                    'title' => 'Drive More Sales',
                                                    'title_link' => '#',
                                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                                    'button_text' => 'Read More',
                                                    'button_link' => '#',
                                                ],
                                                [
                                                    'icon' => 'uni-fire-o',
                                                    'title' => 'Handled By Expert',
                                                    'title_link' => '#',
                                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                                    'button_text' => 'Read More',
                                                    'button_link' => '#',
                                                ],
                                                [
                                                    'icon' => 'uni-flower-o',
                                                    'title' => 'Discussion For Idea',
                                                    'title_link' => '#',
                                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                                    'button_text' => 'Read More',
                                                    'button_link' => '#',
                                                ],
                                                [
                                                    'icon' => 'uni-shopping-basket-o',
                                                    'title' => 'Increase Conversion',
                                                    'title_link' => '#',
                                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                                    'button_text' => 'Read More',
                                                    'button_link' => '#',
                                                ],
                                                [
                                                    'icon' => 'uni-flip-h-o',
                                                    'title' => 'Sales Growth Idea',
                                                    'title_link' => '#',
                                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                                    'button_text' => 'Read More',
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
