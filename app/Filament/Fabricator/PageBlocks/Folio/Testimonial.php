<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Mokhosh\FilamentRating\Components\Rating;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;


class Testimonial extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.testimonial')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
        ->schema([
            Group::make()
             ->schema([
                 Toggle::make('testimonial.is_active')
                     ->label('Show Testimonial Section')
                     ->reactive()
                     ->default(true)
                     ->helperText('Show or hide the Testimonial section on the landing Page.'),
             ]),
            Section::make(__('Testimonial Section'))
                ->description(__('This section is used to display your Testimonial section.'))
                ->collapsible()
                ->collapsed(true)
                ->visible(fn (Get $get) => (bool) ($get('testimonial.is_active') ?? true))
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                        ->schema([
                            Section::make(__('Testimonial Section Details'))
                                ->icon('heroicon-o-bars-3-bottom-left')
                                ->collapsed(false)
                                ->schema([
                                    TextInput::make('testimonial.heading')
                                        ->label(__('Testimonial Section Header'))
                                        ->default('Social proof')
                                        ->placeholder(__('TESTIMONIAL'))
                                        ->maxLength(140),
                                    TextInput::make('testimonial.section_name')
                                        ->label(__('Testimonial Section Name'))
                                        ->default('What clients say')
                                        ->placeholder(__('What clients say'))
                                        ->maxLength(140),
                                    Textarea::make('testimonial.description')
                                        ->label(__('Testimonial Section Description'))
                                        ->default('I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute')
                                        ->placeholder(__('Description for the Blog Section'))
                                        ->maxLength(140),
                                ]),
                            Section::make(__('Testimonial Posts'))
                                ->description(__('Add your testimonial posts here'))
                                ->icon('heroicon-o-sparkles')
                                ->collapsed(true)
                                ->schema([
                                    Repeater::make('testimonial.posts')
                                    ->label('Testimonial Posts')
                                    ->schema([
                                        TextInput::make('author')
                                            ->label('Author Name')
                                            ->required(),

                                        TextInput::make('author_position')
                                        ->label('Post Author Position')
                                        ->placeholder('Author Position ex: Designer')
                                        ->maxLength(160),

                                        Textarea::make('content')
                                            ->label('Description')
                                            ->rows(3)
                                            ->required(),

                                        Rating::make('rating')
                                            ->label('Rating')
                                            ->color('primary')
                                            ->required(),

                                        FileUpload::make('image')
                                            ->label('Image')
                                            ->image()
                                            ->visibility('public')
                                            ->directory('templates/media/testimonial')
                                            ->required()
                                    ])
                                    ->default([
                                        [
                                            'image' => ['templates/upwind/assets/images/client/01.jpg'],
                                            'author' => 'Thomas Israel',
                                            'author_position' => 'Staff Engineer, Algolia',
                                            'content' => "It seems that only fragments of the original text remain in the Lorem Ipsum texts used today.",
                                            'rating' => 5,
                                        ],
                                        [
                                            'image' => ['templates/upwind/assets/images/client/02.jpg'],
                                            'author' => 'Carl Oliver',
                                            'author_position' => 'Staff Engineer, Algolia',
                                            'content' => "The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century.",
                                            'rating' => 5,
                                        ],
                                        [
                                            'image' => ['templates/upwind/assets/images/client/03.jpg'],
                                            'author' => 'Barbara McIntosh',
                                            'author_position' => 'Staff Engineer, Algolia',
                                            'content' => "One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others.",
                                            'rating' => 5,
                                        ],
                                        [
                                            'image' => ['templates/upwind/assets/images/client/04.jpg'],
                                            'author' => 'Jill Webb',
                                            'author_position' => 'Staff Engineer, Algolia',
                                            'content' => "Thus, Lorem Ipsum has only limited suitability as a visual filler for German texts.",
                                            'rating' => 5,
                                        ]
                                    ])
                                    ->grid(2)
                                    ->columnSpanFull(),
                                    ])


                        ]),
                ]),

        ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
