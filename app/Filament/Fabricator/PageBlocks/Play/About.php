<?php

namespace App\Filament\Fabricator\PageBlocks\Play;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;


class About extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.about')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('about.is_active')
                     ->default(true)
                     ->reactive()
                     ->label(__('Show About Section'))
                     ->helperText(__('Show or hide the About section on the landing Page.')),
             ]),
            Section::make(__('About Section'))
                ->description(__('This section is used to display your About section.'))
                ->collapsible()
                ->collapsed(true)
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                        ->schema([
                            Section::make(__('About Section Details'))
                                ->icon('heroicon-o-bars-3-bottom-left')
                                ->collapsed(false)
                                ->schema([
                                    TextInput::make('about.heading')
                                        ->label('Heading')
                                        ->default('Brilliant Toolkit to Build Nextgen Website Faster.')
                                        ->required(),

                                    Textarea::make('about.description')
                                        ->label('Description')
                                        ->default('The main \'thrust\' is to focus on educating attendees on how to best protect highly vulnerable business applications with interactive panel discussions and roundtables led by subject matter experts.

The main \'thrust\' is to focus on educating attendees on how to best protect highly vulnerable business applications with interactive panel.')
                                        ->rows(4)
                                        ->required(),

                                    TextInput::make('about.button_text')
                                        ->label('Button Text')
                                        ->default('Know More')
                                        ->required(),

                                    TextInput::make('about.button_link')
                                        ->label('Button Link')
                                        ->default('#')
                                        ->required(),

                                    FileUpload::make('about.image_1')
                                        ->label('Image 1')
                                        ->image()
                                        ->visibility('public')
                                        ->directory('templates/media/about')
                                        ->default('templates/play/assets/images/about/about-image-01.jpg')
                                        ->required(),

                                    FileUpload::make('about.image_2')
                                        ->label('Image 2')
                                        ->image()
                                        ->visibility('public')
                                        ->directory('templates/media/about')
                                        ->default('templates/play/assets/images/about/about-image-02.jpg')
                                        ->required(),

                                    TextInput::make('about.experience_years')
                                        ->label('Experience Years')
                                        ->default('09')
                                        ->required(),
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