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

class Blog extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.blog')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
            ->schema([
                Group::make()
                    ->schema([
                        Toggle::make('blog.is_active')
                            ->label('Show Blog Section')
                            ->default(true)
                            ->reactive()
                            ->helperText('Show or hide the Blog section on the landing Page.'),
                    ]),
                Section::make(__('Blog Section'))
                    ->description(__('This section is used to display your Blog section.'))
                    ->collapsible()
                    ->collapsed(true)
                    ->visible(fn (Get $get) => (bool) ($get('blog.is_active') ?? true))
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Group::make()
                            ->schema([
                                Section::make(__('Blog Section Details'))
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->collapsed(false)
                                    ->schema([
                                        TextInput::make('blog.heading')
                                            ->label(__('Blog Section Header'))
                                            ->default('Thoughts')
                                            ->placeholder(__('Thoughts'))
                                            ->maxLength(140),
                                        TextInput::make('blog.section_name')
                                            ->label(__('Blog Section Name'))
                                            ->default('From the blog')
                                            ->placeholder(__('From the blog'))
                                            ->maxLength(140),
                                        Textarea::make('blog.description')
                                            ->label(__('Blog Section Description'))
                                            ->default('I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute')
                                            ->placeholder(__('Description for the Blog Section'))
                                            ->maxLength(140),
                                    ]),
                                Section::make(__('Blog Posts'))
                                    ->description(__('Add your blog posts here'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->schema([
                                        TextInput::make('blog.allposts_link')
                                            ->label('All blog posts Link')
                                            ->default('#')
                                            ->placeholder('Link to blog posts')
                                            // ->url()
                                            ->maxLength(160),
                                        Repeater::make('blog.posts')
                                            ->schema([
                                                TextInput::make('category')
                                                    ->label('Post Category')
                                                    ->default('UI Design')
                                                    ->placeholder('UI Design')
                                                    ->maxLength(160),
                                                TextInput::make('category_link')
                                                    ->label('Post Category Link')
                                                    ->default('#')
                                                    // ->url()
                                                    ->maxLength(160),
                                                TextInput::make('title')
                                                    ->label('Post Title')
                                                    ->default('Blog Post Title')
                                                    ->placeholder('Blog Post Title')
                                                    ->maxLength(160),
                                                TextInput::make('intro')
                                                    ->label('Post Intro')
                                                    ->default('Blog Post Intro')
                                                    ->placeholder('Blog Post Intro')
                                                    ->maxLength(160),
                                                TextInput::make('link')
                                                    ->label('Post Link')
                                                    ->default('#')
                                                // ->url()
                                                    ->maxLength(160),
                                                TextInput::make('date')
                                                    ->label('Post Date')
                                                    ->placeholder('Blog Post Date')
                                                    ->maxLength(160),
                                                FileUpload::make('image')
                                                    ->label('Post Image')
                                                    ->image()
                                                    ->visibility('public')
                                                    ->directory('media/templates/folio/blog')
                                                    ->helperText('Recommended size: 1484x964px'),
                                            ])
                                            ->columns(2)
                                            ->default([
                                                [
                                                    'category' => 'UI Design',
                                                    'category_link' => '#',
                                                    'title' => 'Elevate your mornings with perfectly brewed coffee',
                                                    'intro' => 'Elevate your mornings with perfectly brewed coffee',
                                                    'link' => '#',
                                                    'date' => '03 May 2025',
                                                    'image' => ['templates/folio/assets/images/blog/blog-01.jpg'],
                                                ],
                                                [
                                                    'category' => 'Time Management',
                                                    'category_link' => '#',
                                                    'title' => 'Mastering the clock: A guide to time management',
                                                    'intro' => 'Elevate your mornings with perfectly brewed coffee',
                                                    'link' => '#',
                                                    'date' => '01 May 2025',
                                                    'image' => ['templates/folio/assets/images/blog/blog-02.jpg'],
                                                ],
                                                [
                                                    'category' => 'Home Office',
                                                    'category_link' => '#',
                                                    'title' => 'Homeward bound: Crafting a productive home office',
                                                    'link' => '#',
                                                    'intro' => 'Elevate your mornings with perfectly brewed coffee',
                                                    'date' => '29 Apr 2025',
                                                    'image' => ['templates/folio/assets/images/blog/blog-03.jpg'],
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
