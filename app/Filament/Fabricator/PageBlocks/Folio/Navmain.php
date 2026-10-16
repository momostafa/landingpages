<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use App\Models\Page;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Navmain extends PageBlock
{
    public static function getBlockSchema(): Block
    {   
        return Block::make('folio.navmain')
            ->label('Main Navigation')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('navmain.is_active')
                     ->label('Show Navigation Section')
                     ->reactive()
                     ->default(true) 
                     ->helperText('Show or hide the Navigation section on the landing Page.'),
                Toggle::make('navmain.is_social_links_active')
                     ->label('Show Social Links')
                     ->reactive()
                     ->default(true)
                     ->helperText('Show or hide the Social Links section on the Navigation section.'),
             ]),
            Section::make(__('Navigation Section'))
                ->description(__('This section is used to display your Navigation section.'))
                ->collapsible()
                ->collapsed(true)
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                    ->schema([
                        FileUpload::make('navmain.logo')
                            ->label('Logo')
                            ->image()
                            ->default('templates/folio/assets/img/site-logo.svg')
                            ->directory('templates/media/navbar')
                            ->visibility('public')
                            ->required(),

                        Repeater::make('navmain.menu_items')
                            ->label('Menu Items')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required(),

                                TextInput::make('title_link')
                                    ->label('Title Link')
                                    ->required(),

                                TextInput::make('icon')
                                    ->label('Icon')
                                    // ->dropdown(false)
                                    // ->sets(['heroicons'])
                                    ->required(),

                                TextInput::make('nav_number')
                                    ->label('Navigation Number')
                                    ->numeric()
                                    ->required(),

                                TextInput::make('type')
                                    ->label('Type')
                                    ->required(),

                                Toggle::make('is_active')
                                    ->label('Show Navigation Item')
                                    ->default(true)
                                    ->reactive()
                                    ->formatStateUsing(function ($state, Get $get, Page $page) {
                                        // Fast path
                                        if ($get('type') === 'home') {
                                            return true;
                                        }

                                        // Memoize getBlocks() per page/type for this request
                                        static $blocksCache = [];
                                        $name = $get('type');
                                        $type = 'folio.' . $name;
                                        $cacheKey = $page->id . '|' . $type;

                                        if (! array_key_exists($cacheKey, $blocksCache)) {
                                            $blocksCache[$cacheKey] = $page->getBlocks($page->id, $type);
                                        }

                                        $block = $blocksCache[$cacheKey];
                                        return isset($block[$type][$name])
                                            ? (bool) ($block[$type][$name]['is_active'] ?? false)
                                            : false;
                                    })
                                    ->helperText('Show or hide the Navigation item on the landing Page.'),
                            ])
                            ->default([
                                [
                                    'title' => 'Home',
                                    'title_link' => '#home',
                                    'icon' => 'heroicon-o-home',
                                    'nav_number' => 0,
                                    'type' => 'home',
                                ],
                                [
                                    'title' => 'About',
                                    'title_link' => '#about',
                                    'icon' => 'heroicon-o-user',
                                    'nav_number' => 1,
                                    'type' => 'about',
                                ],
                                [
                                    'title' => 'Services',
                                    'title_link' => '#services',
                                    'icon' => 'heroicon-o-sparkles',
                                    'nav_number' => 2,
                                    'type' => 'services',
                                ],
                                [
                                    'title' => 'Skills',
                                    'title_link' => '#skills',
                                    'icon' => 'heroicon-o-academic-cap',
                                    'nav_number' => 3,
                                    'type' => 'skills',
                                ],
                                [
                                    'title' => 'Resume',
                                    'title_link' => '#resume',
                                    'icon' => 'heroicon-o-document-text',
                                    'nav_number' => 4,
                                    'type' => 'resume',
                                ],
                                [
                                    'title' => 'Portfolio',
                                    'title_link' => '#portfolio',
                                    'icon' => 'heroicon-o-briefcase',
                                    'nav_number' => 5,
                                    'type' => 'portfolio',
                                ],
                                [
                                    'title' => 'Blog',
                                    'title_link' => '#blog',
                                    'icon' => 'heroicon-o-newspaper',
                                    'nav_number' => 6,
                                    'type' => 'blog',
                                ],
                                [
                                    'title' => 'Testimonials',
                                    'title_link' => '#testimonials',
                                    'icon' => 'heroicon-o-chat-bubble-left-ellipsis',
                                    'nav_number' => 7,
                                    'type' => 'testimonial',
                                ],
                                [
                                    'title' => 'Contact',
                                    'title_link' => '#contact',
                                    'icon' => 'heroicon-o-envelope',
                                    'nav_number' => 8,
                                    'type' => 'contact',
                                ]
                            ])
                            ->grid(2)
                            ->columnSpanFull(),
                    Repeater::make('navmain.social_links')
                        ->label('Social Links')
                        ->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->required(),

                            TextInput::make('title_link')
                                ->label('Title Link')
                                ->required(),

                            TextInput::make('icon')
                                ->label('Icon')
                                // ->dropdown(false)
                                // ->sets(['heroicons'])
                                ->required(),
                        ])
                        ->grid(2)
                        ->columnSpanFull()
                        ->default([
                            [
                                'title' => 'Linkedin',
                                'title_link' => 'https://www.linkedin.com/company/folio',
                                'icon' => 'uni-linkedin-o'
                            ],
                            [
                                'title' => 'Facebook',
                                'title_link' => 'https://www.facebook.com/folio',
                                'icon' => 'uni-facebook-f-o'
                            ],
                            [
                                'title' => 'Twitter',
                                'title_link' => 'https://www.twitter.com/folio',
                                'icon' => 'uni-twitter-o'
                            ],
                            [
                                'title' => 'Instagram',
                                'title_link' => 'https://www.instagram.com/folio',
                                'icon' => 'uni-instagram-o'
                            ],
                        ])
                    ])->columns(2),
                ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
