<?php

namespace App\Filament\Fabricator\PageBlocks\Play;

use App\Models\Page;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Happenv\FilamentTranslatable\Forms\Component\Translations;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Navbar extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.navbar')
            ->label('Navigation Bar')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
            ->schema([
                Translations::make('translations')
                    ->prefixLocaleLabel()
                    ->contained(false)
                    ->exclude([
                        'navbar.is_active',
                        'navbar.logo_dark',
                        'navbar.logo_light',
                        'navbar.menu_items.title_link',
                        'navbar.menu_items.title_type',
                        'navbar.menu_items.is_active',
                        'navbar.signin_link',
                        'navbar.signup_link',
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                Toggle::make('navbar.is_active')
                                    ->default(true)
                                    ->reactive()
                                    ->label(__('Show Navigation Section'))
                                    ->helperText(__('Show or hide the Navigation section on the landing Page.')),
                            ]),
                        Section::make(__('Navigation Section'))
                            ->description(__('This section is used to display your Navigation section.'))
                            ->collapsible()
                            ->collapsed(true)
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        FileUpload::make('navbar.logo_dark')
                                            ->label('Logo Dark')
                                            ->image()
                                            ->visibility('public')
                                            ->default('templates/play/assets/images/logo/logo-white.svg')
                                            ->directory('templates/media/navbar')
                                            ->required(),

                                        FileUpload::make('navbar.logo_light')
                                            ->label('Logo Light')
                                            ->image()
                                            ->visibility('public')
                                            ->default('templates/play/assets/images/logo/logo.svg')
                                            ->directory('templates/media/navbar')
                                            ->required(),

                                        Repeater::make('navbar.menu_items')
                                            ->label('Menu Items')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),

                                                TextInput::make('title_link')
                                                    ->label('Title Link')
                                                    ->required(),

                                                TextInput::make('type')
                                                    ->label('Type')
                                                    ->required(),

                                                Toggle::make('is_active')
                                                    ->label('Is Active')
                                                    ->reactive()
                                                    ->formatStateUsing(function ($state, Get $get, ?Page $page = null) {
                                                        if ($get('type') === 'home') {
                                                            return true;
                                                        }

                                                        if (! $page) {
                                                            return $state ?? true;
                                                        }

                                                        static $blocksCache = [];
                                                        $name = $get('type');
                                                        $type = "play.{$name}";
                                                        $cacheKey = "{$page->id}|{$type}";

                                                        if (! array_key_exists($cacheKey, $blocksCache)) {
                                                            $blocksCache[$cacheKey] = $page->getBlocks($page->id, $type);
                                                        }

                                                        $block = $blocksCache[$cacheKey];

                                                        return isset($block[$type][$name])
                                                            ? (bool) ($block[$type][$name]['is_active'] ?? false)
                                                            : false;
                                                    })
                                                    ->default(true),
                                            ])
                                            ->default([
                                                [
                                                    'title' => 'Home',
                                                    'title_link' => '#home',
                                                    'type' => 'home',
                                                ],
                                                [
                                                    'title' => 'About',
                                                    'title_link' => '#about',
                                                    'type' => 'about',
                                                ],
                                                [
                                                    'title' => 'Features',
                                                    'title_link' => '#features',
                                                    'type' => 'features',
                                                ],
                                                [
                                                    'title' => 'Pricing',
                                                    'title_link' => '#pricing',
                                                    'type' => 'pricing',
                                                ],
                                                [
                                                    'title' => 'Team',
                                                    'title_link' => '#team',
                                                    'type' => 'team',
                                                ],
                                                [
                                                    'title' => 'Contact',
                                                    'title_link' => '#contact',
                                                    'type' => 'contact',
                                                ],
                                                [
                                                    'title' => 'Blog',
                                                    'title_link' => '#blog',
                                                    'type' => 'blog',
                                                ],
                                            ])
                                            ->grid(2)
                                            ->columnSpanFull(),

                                        TextInput::make('navbar.signin_text')
                                            ->label('Sign In Text')
                                            ->default('Sign In'),

                                        TextInput::make('navbar.signin_link')
                                            ->label('Sign In Link')
                                            ->default('#'),

                                        TextInput::make('navbar.signup_text')
                                            ->label('Sign Up Text')
                                            ->default('Sign Up'),

                                        TextInput::make('navbar.signup_link')
                                            ->label('Sign Up Link')
                                            ->default('#'),
                                    ])->columns(2),
                            ]),
                    ]),

            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
