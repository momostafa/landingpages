<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;


class Footer extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.footer')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('footer.is_active')
                     ->label('Show Footer Section')
                     ->reactive()
                     ->default(true) 
                     ->helperText('Show or hide the Footer section on the landing Page.'),
             ]),
            Section::make(__('Footer Section'))
                ->description(__('This section is used to display your Footer section.'))
                ->collapsible()
                ->collapsed(true)
                ->visible(fn (Get $get) => (bool) ($get('footer.is_active') ?? true))
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                        ->schema([
                            Section::make(__('Footer Section Details'))
                                ->icon('heroicon-o-bars-3-bottom-left')
                                ->collapsed(false)
                                ->schema([
                                    Textarea::make('footer.content')
                                        ->label(__('Footer Section Content'))
                                        ->default('Copyright  2025. All rights reserved.')
                                        ->placeholder(__('Content of the Footer Section'))
                                        ->maxLength(140),
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