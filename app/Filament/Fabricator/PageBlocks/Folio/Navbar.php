<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use App\Models\Page;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Navbar extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.navbar')
            ->label('Main Navigation')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
            ->schema([
                Group::make()
                    ->schema([
                        Toggle::make('navbar.is_active')
                            ->label('Show Navigation Section')
                            ->reactive()
                            ->default(true)
                            ->helperText('Show or hide the Navigation section on the landing Page.'),
                    ]),
                Section::make(__('Navigation Section'))
                    ->description(__('This section is used to display your Navigation section.'))
                    ->collapsible()
                    ->collapsed(true)
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Group::make()
                            ->schema([
                                TextInput::make('logo_text')
                                    ->label('Logo Text 1')
                                    ->default('eli')
                                    ->helperText('First part of the logo text. Can be your First name or part of it for styling')
                                    ->required(),
                                TextInput::make('logo_text1')
                                    ->label('Logo Text 2')
                                    ->default('ott')
                                    ->helperText('Second part of the logo text. Can be your Second name or second part of your First name')
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
                                                $type = "folio.{$name}";
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
                                        ],
                                        [
                                            'title' => 'About',
                                            'title_link' => '#about',
                                        ],
                                        [
                                            'title' => 'Services',
                                            'title_link' => '#services',
                                        ],
                                        [
                                            'title' => 'Portfolio',
                                            'title_link' => '#portfolio',
                                        ],
                                        [
                                            'title' => 'Blog',
                                            'title_link' => '#blog',
                                        ],
                                        [
                                            'title' => 'Testimonials',
                                            'title_link' => '#testimonial',
                                        ],
                                        [
                                            'title' => 'Contact',
                                            'title_link' => '#contact',
                                        ],
                                    ])
                                    ->grid(2)
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
