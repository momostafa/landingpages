<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Skills extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.skills')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
            ->schema([
                Group::make()
                    ->schema([
                        Toggle::make('skills.is_active')
                            ->label('Show Skills Section')
                            ->reactive()
                            ->default(true)
                            ->helperText('Show or hide the Skills section on the landing Page.'),
                    ]),
                Section::make(__('Skills Section'))
                    ->description(__('This section is used to display your Skills section.'))
                    ->collapsible()
                    ->collapsed(true)
                    ->icon('heroicon-o-photo')
                    ->visible(fn (Get $get) => (bool) ($get('skills.is_active') ?? true))
                    ->schema([
                        Group::make()
                            ->schema([
                                Section::make(__('Skills Section Details'))
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->collapsed(false)
                                    ->schema([
                                        TextInput::make('skills.section_header')
                                            ->label(__('Skills Section Header'))
                                            ->default('SKILLS')
                                            ->placeholder(__('SKILLS'))
                                            ->maxLength(140),
                                        TextInput::make('skills.section_name')
                                            ->label(__('Skills Section Name'))
                                            ->default('My Advantages')
                                            ->placeholder(__('My Advantages'))
                                            ->maxLength(140),
                                        Textarea::make('skills.description')
                                            ->label(__('Skills Section Description'))
                                            ->default('I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute')
                                            ->placeholder(__('Description for Skills Section'))
                                            ->maxLength(140),
                                    ]),
                                Section::make(__('Skills Items'))
                                    ->description(__('Add your Skills'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                   // ->columns(3)
                                    ->schema([
                                        Repeater::make('skills.items')
                                            ->schema([
                                                TextInput::make('percentage')
                                                    ->label('Skill Percentage')
                                                    ->suffix('%'),
                                                TextInput::make('title')
                                                    ->label('Skill Title')
                                                    ->maxLength(160),
                                                Textarea::make('description')
                                                    ->label('Skill Description')
                                                    ->maxLength(160),
                                                TextInput::make('icon')
                                                    ->label('Skill Icon'),
                                                // ->dropdown(false)
                                                // ->sets(['heroicons']),
                                                FileUpload::make('image')
                                                    ->label('Service Image')
                                                    ->image()
                                                    ->visibility('public')
                                                    ->directory('templates/folio/skills'),
                                            ])->columns(2)
                                            ->default([
                                                [
                                                    'percentage' => '95',
                                                    'title' => 'HTML5',
                                                    'description' => '',
                                                    'icon' => '',
                                                    'image' => ['templates/folio/assets/img/skill/html.svg'],
                                                ],
                                                [
                                                    'percentage' => '90',
                                                    'title' => 'Figma',
                                                    'description' => '',
                                                    'icon' => '',
                                                    'image' => ['templates/folio/assets/img/skill/figma.svg'],
                                                ],
                                                [
                                                    'percentage' => '85',
                                                    'title' => 'Webflow',
                                                    'description' => '',
                                                    'icon' => '',
                                                    'image' => ['templates/folio/assets/img/skill/webflow.svg'],
                                                ],
                                                [
                                                    'percentage' => '80',
                                                    'title' => 'Tailwind',
                                                    'description' => '',
                                                    'icon' => '',
                                                    'image' => ['templates/folio/assets/img/skill/tailwind.svg'],
                                                ],
                                                [
                                                    'percentage' => '75',
                                                    'title' => 'JavaScript',
                                                    'description' => '',
                                                    'icon' => '',
                                                    'image' => ['templates/folio/assets/img/skill/js.svg'],
                                                ],
                                                [
                                                    'percentage' => '70',
                                                    'title' => 'jQuery',
                                                    'description' => '',
                                                    'icon' => '',
                                                    'image' => ['templates/folio/assets/img/skill/jquery.svg'],
                                                ],
                                                [
                                                    'percentage' => '70',
                                                    'title' => 'CSS3',
                                                    'description' => '',
                                                    'icon' => '',
                                                    'image' => ['templates/folio/assets/img/skill/css.svg'],
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
