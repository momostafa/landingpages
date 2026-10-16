<?php

namespace App\Filament\Fabricator\PageBlocks\Play;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Blog extends PageBlock
{
    public static function getBlockSchema(): Block
    {   
        return Block::make('play.blog')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('blog.is_active')
                     ->default(true)
                     ->reactive()
                     ->label(__('Show Blog Section'))
                     ->helperText(__('Show or hide the blog section on the landing Page.')),
             ]),
            Section::make(__('Blog Section'))
                ->description(__('This section is used to display your Blog section.'))
                ->collapsible()
                ->collapsed(true)
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                    ->schema([
                        TextInput::make('blog.section_title')
                            ->label('Blog Title')
                            ->default('Blog')
                            ->required(),

                        TextInput::make('blog.heading')
                            ->label('Blog Heading')
                            ->default('Latest News')
                            ->required(),

                        Textarea::make('blog.description')
                            ->label('Blog Description')
                            ->default('Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page')
                            ->rows(3)
                            ->required(),

                        Repeater::make('blog.items')
                            ->label('Blog Items')
                            ->schema([
                                TextInput::make('id')
                                    ->label('ID')
                                    ->numeric()
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
                                    ->label('Button Link')
                                    ->required(),

                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->visibility('public')
                                    ->directory('templates/media/portfolio')
                                    ->required(),
                                    
                                DateTimePicker::make('published_at')
                                    ->label('Published At')
                                    ->seconds(false)
                                    ->displayFormat('Y-m-d H:i:s'),
                            ])
                            ->default([
                                [
                                    'id' => 1,
                                    'image' => ['templates/play/assets/images/blog/blog-01.jpg'], 
                                    'title' => 'Building Your Corporate Identity from Play', 
                                    'title_link' => '#',
                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                    'button_text' => 'Read More',
                                    'button_link' => '#',
                                    'published_at' => now()->subDays(1)->toDateTimeString()
                                ],
                                [
                                    'id' => 2,
                                    'image' => ['templates/play/assets/images/blog/blog-02.jpg'], 
                                    'title' => 'The Right Hand of Business IT World', 
                                    'title_link' => '#',
                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                    'button_text' => 'Read More',
                                    'button_link' => '#',
                                    'published_at' => now()->subDays(2)->toDateTimeString()
                                ],
                                [
                                    'id' => 3,
                                    'image' => ['templates/play/assets/images/blog/blog-03.jpg'], 
                                    'title' => 'The Building Your Corporate Identity from Play', 
                                    'title_link' => '#',
                                    'description' => 'The phrasal sequence of the is now so that many campaign and benefit',
                                    'button_text' => 'Read More',
                                    'button_link' => '#',
                                    'published_at' => now()->subDays(3)->toDateTimeString()
                                ]
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
