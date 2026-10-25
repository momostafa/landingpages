<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Profile extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.profile')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
            ->schema([
                Group::make()
                // ->relationship('module')
                    ->schema([
                        // Toggle::make('module.hero')
                        Toggle::make('profile.is_active')
                            ->label('Show Profile Section')
                            ->default(true)
                            ->reactive()
                            ->label('Show Profile Section')
                            ->helperText('Show or hide the Profile section on the landing Page.'),
                    ]),
                Section::make(__('Profile Section'))
                    ->description(__('This section is used to display your profile section.'))
                    ->collapsible()
                    ->collapsed(true)
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Group::make()
                            // ->relationship('layout')
                            ->schema([
                                // Group::make()
                                //     ->columns(3),
                                Section::make(__('Name & Designation'))
                                    ->description(__('Configure the name and designation of your Profile Section'))
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->collapsed(false)
                                    ->schema([
                                        TextInput::make('profile.name')
                                            ->label(__('Profile Name'))
                                            ->default('Brown Reddick')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Brown Reddick'))
                                            ->maxLength(140),
                                        TextInput::make('profile.designation')
                                            ->label('Profile Designation')
                                            ->default('Web Developer')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Web Developer'))
                                            ->maxLength(160),
                                        TextInput::make('profile.residence')
                                            ->label('Profile Residence')
                                            ->default('Canada')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Canada'))
                                            ->maxLength(160),
                                        TextInput::make('profile.city')
                                            ->label('Profile City')
                                            ->default('Toronto')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('Toronto'))
                                            ->maxLength(160),
                                        TextInput::make('profile.age')
                                            ->label('Profile Age')
                                            ->default('28')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->placeholder(__('28'))
                                            ->maxLength(160),
                                    ])->columns(3),

                                Section::make(__('Profile Image'))
                                    ->description(__('Avatar or Logo for your Profile Section.'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->columns(3)
                                    ->schema([
                                        FileUpload::make('profile.avatarlight')
                                            ->label('Light - Profile Avatar')
                                            ->default('templates/folio/assets/img/hero/user_thumb.png')
                                            ->directory('templates/media/profile')
                                            ->maxSize(10000)
                                            ->image()
                                            ->visibility('public')
                                            ->columnSpan(2)
                                            ->imageEditor()
                                            ->helperText(__('This is your avatar or logo for your Profile Section.')),
                                        FileUpload::make('profile.avatardark')
                                            ->label('Dark - Profile Avatar')
                                            ->default('templates/folio/assets/img/hero/user_thumb.png')
                                            ->directory('templates/media/profile')
                                            ->maxSize(10000)
                                            ->image()
                                            ->visibility('public')
                                            ->columnSpan(2)
                                            ->imageEditor()
                                            ->helperText(__('This is your avatar or logo for your Profile Section.')),
                                    ]),

                                Section::make('Skills')
                                    ->description(__('Skills for your Profile Section.'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->columns(3)
                                    ->schema([
                                        TextInput::make('profile.skill1')
                                            ->label('Skill 1')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->default('HTML')
                                            ->placeholder(__('HTML'))
                                            ->maxLength(160),
                                        TextInput::make('profile.skill1percent')
                                            ->label('Skill 1 Percentage')
                                            ->numeric()
                                            ->suffix('%')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->default('90')
                                            ->placeholder(__('90'))
                                            ->maxLength(160),
                                        TextInput::make('profile.skill2')
                                            ->label('Skill 2')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->default('CSS')
                                            ->placeholder(__('CSS'))
                                            ->maxLength(160),
                                        TextInput::make('profile.skill2percent')
                                            ->label('Skill 2 Percentage')
                                            ->numeric()
                                            ->suffix('%')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->default('90')
                                            ->placeholder(__('90'))
                                            ->maxLength(160),
                                        TextInput::make('profile.skill3')
                                            ->label('Skill 3')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->default('JavaScript')
                                            ->placeholder(__('JavaScript'))
                                            ->maxLength(160),
                                        TextInput::make('profile.skill3percent')
                                            ->label('Skill 3 Percentage')
                                            ->numeric()
                                            ->suffix('%')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->default('90')
                                            ->placeholder(__('90'))
                                            ->maxLength(160),
                                        TextInput::make('profile.skill4')
                                            ->label('Skill 4')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->default('PHP')
                                            ->placeholder(__('PHP'))
                                            ->maxLength(160),
                                        TextInput::make('profile.skill4percent')
                                            ->label('Skill 4 Percentage')
                                            ->numeric()
                                            ->suffix('%')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->default('90')
                                            ->placeholder(__('90'))
                                            ->maxLength(160),
                                    ])->columns(2),

                                Section::make('Upload Resume')
                                    ->description(__('Upload Resume for your Profile Section.'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->columns(3)
                                    ->schema([
                                        FileUpload::make('profile.resume')
                                            ->label('Resume')
                                            ->default('templates/folio/assets/resume-sample.pdf')
                                            ->directory('templates/media/profile')
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->visibility('public')
                                            ->downloadable()
                                            ->maxSize(50000)
                                            ->columnSpan(2)
                                            ->helperText(__('Only PDF files are allowed.')),
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
