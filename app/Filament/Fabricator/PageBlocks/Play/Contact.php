<?php

namespace App\Filament\Fabricator\PageBlocks\Play;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Happenv\FilamentTranslatable\Forms\Component\Translations;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Contact extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.contact')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
            ->schema([
                Translations::make('translations')
                    ->prefixLocaleLabel()
                    ->contained(false)
                    ->exclude([
                        'contact.is_active',
                        'contact.phone',
                        'contact.email',
                        'contact.website',
                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                Toggle::make('contact.is_active')
                                    ->label('Show Contact Section')
                                    ->reactive()
                                    ->default(true)
                                    ->helperText('Show or hide the Contact section on the landing Page.'),
                            ]),
                        Section::make(__('Contact Section'))
                            ->description(__('This section is used to display your Contact section.'))
                            ->collapsible()
                            ->collapsed(true)
                            ->icon('heroicon-o-photo')
                            ->visible(fn (Get $get) => (bool) ($get('contact.is_active') ?? true))
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Section::make(__('Contact Section Details'))
                                            ->icon('heroicon-o-bars-3-bottom-left')
                                            ->collapsed(false)
                                            ->schema([
                                                TextInput::make('contact.section_name')
                                                    ->label(__('Contact Section Name'))
                                                    ->default('Contact Us')
                                                    ->placeholder(__('Contact Us'))
                                                    ->maxLength(140),

                                                TextInput::make('contact.heading')
                                                    ->label(__('Contact Section Header'))
                                                    ->default('Our Location')
                                                    ->placeholder(__('Our Location'))
                                                    ->maxLength(140),

                                                TextInput::make('contact.heading2')
                                                    ->label(__('Contact Section Header2'))
                                                    ->default('How Can We Help?')
                                                    ->placeholder(__('How Can We Help?'))
                                                    ->maxLength(140),

                                                Textarea::make('contact.description')
                                                    ->label(__('Contact Section Description'))
                                                    ->default("Let's talk about your project.")
                                                    ->placeholder(__('Description for the Contact Section'))
                                                    ->maxLength(100),

                                                TextInput::make('contact.phone')
                                                    ->label('Contact Phone')
                                                    ->default('+152 534-468-854')
                                                    ->tel()
                                                    ->required(),

                                                TextInput::make('contact.email')
                                                    ->label('Contact Email')
                                                    ->default('contact@example.com')
                                                    ->email()
                                                    ->required(),

                                                TextInput::make('contact.website')
                                                    ->label('Contact Website')
                                                    ->default('https://example.com')
                                                    ->url()
                                                    ->required(),

                                                TextInput::make('contact.address')
                                                    ->label('Contact Address')
                                                    ->default('C/54 Northwest Freeway, Suite 558, Houston, USA 485')
                                                    ->required(),
                                            ]),
                                        Section::make(__('Contact Form Autoresponder'))
                                            ->description(__('This section is used to display your Contact Form Autoresponder. This is used to send an email to the user when they submit the contact form.'))
                                            ->collapsible()
                                            ->collapsed(true)
                                            ->icon('heroicon-o-photo')
                                            ->schema([
                                                Group::make()
                                                    ->schema([
                                                        TextInput::make('contact.autoresponder.subject')
                                                            ->label('Contact Form Autoresponder Subject')
                                                            ->default('New Contact Form Submission')
                                                            ->required(),
                                                        TextInput::make('contact.autoresponder.to_email')
                                                            ->label('Contact Form Autoresponder To Email')
                                                            ->default('info@example.com')
                                                            ->email()
                                                            ->required(),
                                                        TextInput::make('contact.autoresponder.to_name')
                                                            ->label('Contact Form Autoresponder To Name')
                                                            ->default('John Doe')
                                                            ->required(),
                                                        TextInput::make('contact.autoresponder.cc')
                                                            ->label('Contact Form Autoresponder CC')
                                                            ->default('cc@example.com')
                                                            ->email()
                                                            ->required(),
                                                        TextInput::make('contact.autoresponder.reply_to')
                                                            ->label('Contact Form Autoresponder Reply To')
                                                            ->default('reply@example.com')
                                                            ->email()
                                                            ->required(),
                                                        TextInput::make('contact.autoresponder.from_name')
                                                            ->label('Contact Form Autoresponder From Name')
                                                            ->default('John Doe')
                                                            ->required(),
                                                        TextInput::make('contact.autoresponder.from_email')
                                                            ->label('Contact Form Autoresponder From Email')
                                                            ->default('noreply@example.com')
                                                            ->email()
                                                            ->required(),
                                                    ])->columns(2),
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
