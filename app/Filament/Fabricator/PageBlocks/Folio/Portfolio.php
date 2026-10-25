<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Portfolio extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.portfolio')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
            ->schema([
                Group::make()
                    ->schema([
                        Toggle::make('portfolio.is_active')
                            ->label('Show Portfolio Section')
                            ->reactive()
                            ->default(true)
                            ->helperText('Show or hide the Portfolio section on the landing Page.'),
                    ]),
                Section::make(__('Portfolio Section'))
                    ->description(__('This section is used to display your Portfolio section.'))
                    ->collapsible()
                    ->collapsed(true)
                    ->visible(fn (Get $get) => (bool) ($get('portfolio.is_active') ?? true))
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Group::make()
                            ->schema([
                                Section::make(__('Portfolio Section Details'))
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->collapsed(false)
                                    ->schema([
                                        TextInput::make('portfolio.heading')
                                            ->label(__('Portfolio Section Header'))
                                            ->default('PORTFOLIO')
                                            ->placeholder(__('PORTFOLIO'))
                                            ->maxLength(140),
                                        TextInput::make('portfolio.section_name')
                                            ->label(__('Portfolio Section Name'))
                                            ->default('Featured Projects')
                                            ->placeholder(__('Featured Projects'))
                                            ->maxLength(140),
                                        Textarea::make('portfolio.description')
                                            ->label(__('Portfolio Section Description'))
                                            ->default('I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute')
                                            ->placeholder(__('Description for Portfolio Section'))
                                            ->maxLength(140),
                                    ]),
                                Section::make(__('Portfolio Items'))
                                    ->description(__('Add your portfolio items here'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                   // ->columns(3)
                                    ->schema([
                                        TextInput::make('portfolio.allprojects_link')
                                            ->label('All Project Link')
                                            ->default('#')
                                            ->placeholder('Link to all projects')
                                            // ->url()
                                            ->maxLength(160),
                                        Repeater::make('portfolio.items')
                                            ->schema([
                                                TextInput::make('category')
                                                    ->label('Project Category')
                                                    ->default('Branding')
                                                    ->placeholder('Branding')
                                                    ->maxLength(160),
                                                TextInput::make('category_link')
                                                    ->label('Project Category Link')
                                                    ->default('#')
                                                    // ->url()
                                                    ->maxLength(160),
                                                TextInput::make('title')
                                                    ->label('Project Title')
                                                    ->default('Project Title')
                                                    ->placeholder('Project Title')
                                                    ->maxLength(160),
                                                TextInput::make('link')
                                                    ->label('Project Link')
                                                    ->default('#')
                                                    // ->url()
                                                    ->maxLength(160),
                                                Textarea::make('description')
                                                    ->label('Skill Description')
                                                    ->default('I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute')
                                                    ->placeholder('Description of the project')
                                                    ->maxLength(160),
                                                TagsInput::make('tags')
                                                    ->splitKeys(['Tab', ' '])
                                                    ->suggestions([
                                                        'tailwindcss',
                                                        'alpinejs',
                                                        'laravel',
                                                        'livewire',
                                                        'Figma',
                                                    ]),
                                                FileUpload::make('image')
                                                    ->label('Project Image')
                                                    ->image()
                                                    ->visibility('public')
                                                    ->directory('media/templates/folio/portfolio')
                                                    ->helperText('Recommended Large: 810x374px, Small: 375x374px'),
                                                Select::make('col_span')
                                                    ->label('Image Display')
                                                    ->options([
                                                        'col-span-2' => 'Large - Col Span 2',
                                                        'col-span-1' => 'Small - Col Span 1',
                                                    ]),
                                            ])->columns(2)
                                            ->default([
                                                [
                                                    'category' => 'Branding',
                                                    'category_link' => '#',
                                                    'title' => 'Project Title',
                                                    'link' => '#',
                                                    'description' => 'I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute',
                                                    'tags' => [
                                                        'tailwindcss',
                                                        'alpinejs',
                                                        'laravel',
                                                        'livewire',
                                                        'Figma',
                                                    ],
                                                    'image' => ['templates/folio/assets/images/portfolio/1.jpg'],
                                                    'col_span' => 'col-span-2',
                                                ],
                                                [
                                                    'category' => 'Branding',
                                                    'category_link' => '#',
                                                    'title' => 'Project Title',
                                                    'link' => '#',
                                                    'description' => 'I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute',
                                                    'tags' => [
                                                        'tailwindcss',
                                                        'alpinejs',
                                                        'laravel',
                                                        'livewire',
                                                    ],
                                                    'image' => ['templates/folio/assets/images/portfolio/2.jpg'],
                                                    'col_span' => 'col-span-1',
                                                ],
                                                [
                                                    'category' => 'Branding',
                                                    'category_link' => '#',
                                                    'title' => 'Project Title',
                                                    'link' => '#',
                                                    'description' => 'I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute',
                                                    'tags' => [
                                                        'tailwindcss',
                                                        'laravel',
                                                        'livewire',
                                                        'Figma',
                                                    ],
                                                    'image' => ['templates/folio/assets/images/portfolio/3.jpg'],
                                                    'col_span' => 'col-span-1',
                                                ],
                                                [
                                                    'category' => 'Branding',
                                                    'category_link' => '#',
                                                    'title' => 'Project Title',
                                                    'link' => '#',
                                                    'description' => 'I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute',
                                                    'tags' => [
                                                        'tailwindcss',
                                                        'NodeJs',
                                                        'laravel',
                                                        'livewire',
                                                        'Figma',
                                                    ],
                                                    'image' => ['templates/folio/assets/images/portfolio/4.jpg'],
                                                    'col_span' => 'col-span-1',
                                                ],
                                            ]),
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
