<?php

namespace App\Filament\Fabricator\PageBlocks\Play;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Meta extends PageBlock
{
    public static function getBlockSchema(): Block
    {   
        return Block::make('play.meta')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-document-text')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('meta.is_active')
                     ->default(true) 
                     ->reactive()
                     ->label(__('Show Meta Section'))
                     ->helperText(__('Show or hide the meta section on the landing Page.')),
             ]),
            Section::make(__('Meta Section'))
                ->description(__('This section is used to display your Meta section.'))
                ->collapsible()
                ->collapsed(true)
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                    ->schema([
                        TextInput::make('meta.title')
                            ->label('Title')
                            ->default('Play - Laravel 12 Landing Page Template')
                            ->required(),

                        TextInput::make('meta.description')
                            ->label('Description')
                            ->default('Responsive Tailwind CSS Template')
                            ->required(),

                        TagsInput::make('meta.keywords')
                            ->label('Keywords')
                            ->default(['Onepage', 'creative', 'modern', 'Tailwind CSS', 'multipurpose', 'clean'])
                            ->required(),

                        TextInput::make('meta.author')
                            ->label('Author')
                            ->default('Website Name')
                            ->required(),

                        TextInput::make('meta.website')
                            ->label('Website')
                            ->default('https://website.com')
                            ->required(),

                        TextInput::make('meta.email')
                            ->label('Email')
                            ->default('support@website.com')
                            ->required(),

                        TextInput::make('meta.version')
                            ->label('Version')
                            ->default('2.1.0')
                            ->required(),

                        FileUpload::make('meta.favicon')
                            ->label('Favicon')
                            ->image()
                            ->visibility('public')
                            ->default('templates/play/assets/images/favicon.ico')
                            ->directory('templates/media/meta')
                            ->required(),
                    ]),
                ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
