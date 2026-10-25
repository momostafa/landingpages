<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Guava\IconPicker\Forms\Components\IconPicker;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Contact extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.contact')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
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
                                            ->default('Get in touch')
                                            ->placeholder(__('Get in touch'))
                                            ->maxLength(140),
                                        TextInput::make('contact.heading')
                                            ->label(__('Contact Section Header'))
                                            ->default("Let's work")
                                            ->placeholder(__("Let's work"))
                                            ->maxLength(140),
                                        TextInput::make('contact.heading2')
                                            ->label(__('Contact Section Header2'))
                                            ->default('together')
                                            ->placeholder(__('together'))
                                            ->maxLength(140),
                                        Textarea::make('contact.description')
                                            ->label(__('Contact Section Description'))
                                            ->default("I'm open to UI/UX and frontend missions, short or long-term. Landing page, full product redesign, or just a second pair of eyes — let's talk.")
                                            ->placeholder(__('Description for the Contact Section'))
                                            ->maxLength(200),
                                    ]),
                                Section::make(__('Contact Details'))
                                    ->description(__('Add your contact details here'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->schema([
                                        Repeater::make('contact.items')
                                            ->label(__('Contact Info'))
                                            ->schema([
                                                Select::make('type')
                                                    ->label(__('Type'))
                                                    ->options(
                                                        function () {
                                                            $socials = self::getSocialFields();
                                                            // dd($socials);
                                                            foreach ($socials as $key => $value) {
                                                                $socials[$key] = $value['name'];
                                                            }

                                                            return $socials;
                                                        })
                                                    ->afterStateUpdated(function ($state, Set $set) {
                                                        $types = self::getSocialFields();
                                                        foreach ($types as $key => $value) {
                                                            if ($key == $state) {
                                                                $icon = $value['icon'];
                                                                $set('icon', $icon);
                                                            }
                                                        }
                                                    })
                                                    ->live()
                                                    ->required(),
                                                IconPicker::make('icon')
                                                    ->label('Icon')
                                                    ->columnSpanFull()
                                                    ->searchPrompt('Search icons by name')
                                                    ->closeOnSelect()
                                                    ->required(),
                                                TextInput::make('url')
                                                    ->label(
                                                        function (Get $get, Set $set) {
                                                            if ($get('type')) {
                                                                return ucfirst($get('type')).' URL';
                                                            }
                                                        }
                                                    )
                                                    ->type(function (Get $get, Set $set) {
                                                        if ($get('type')) {
                                                            $types = self::getSocialFields();
                                                            foreach ($types as $key => $value) {
                                                                if ($key == $get('type')) {
                                                                    $type = $value['type'];
                                                                }
                                                            }

                                                            return $type;
                                                        }
                                                    })
                                                    ->placeholder(function (Get $get) {
                                                        if ($get('type')) {
                                                            $types = self::getSocialFields();
                                                            // dd($types);
                                                            foreach ($types as $key => $value) {
                                                                if ($key == 'address') {
                                                                    $placeholder = $value['placeholder_url'];

                                                                    return $placeholder;
                                                                }
                                                                if ($key == $get('type')) {
                                                                    $placeholder = $value['placeholder'];

                                                                    return $placeholder;
                                                                }
                                                            }

                                                        }
                                                    }
                                                    )
                                                    ->columnSpanFull(),
                                                TextInput::make('address')
                                                    ->label(__('Address'))
                                                    ->placeholder('1234 Main St, Anytown, USA')
                                                    ->visible(function (Get $get) {
                                                        if ($get('type')) {
                                                            if ($get('type') == 'address') {
                                                                return true;
                                                            }
                                                        }
                                                    })
                                                    ->columnSpanFull(),

                                            ])->columns(3),

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

            ]);
    }

    public static function getSocialFields(): array
    {
        $data = [
            'facebook' => ['name' => 'Facebook', 'type' => 'url', 'icon' => 'uni-facebook-o', 'label' => 'Facebook', 'placeholder' => 'https://www.facebook.com/yourpage'],
            'twitter' => ['name' => 'Twitter', 'type' => 'url', 'icon' => 'uni-twitter-o', 'label' => 'Twitter', 'placeholder' => 'https://www.twitter.com/yourpage'],
            'instagram' => ['name' => 'Instagram', 'type' => 'url', 'icon' => 'uni-instagram-o', 'label' => 'Instagram', 'placeholder' => 'https://www.instagram.com/yourpage'],
            'whatsapp' => ['name' => 'Whatsapp', 'type' => 'url', 'icon' => 'uni-whatsapp-o', 'label' => 'Whatsapp', 'placeholder' => 'https://www.whatsapp.com/yourpage'],
            'telegram' => ['name' => 'Telegram', 'type' => 'url', 'icon' => 'uni-telegram-o', 'label' => 'Telegram', 'placeholder' => 'https://www.telegram.com/yourpage'],
            'linkedin' => ['name' => 'Linkedin', 'type' => 'url', 'icon' => 'uni-linkedin-o', 'label' => 'Linkedin', 'placeholder' => 'https://www.linkedin.com/yourpage'],
            'github' => ['name' => 'Github', 'type' => 'url', 'icon' => 'uni-github-o', 'label' => 'Github', 'placeholder' => 'https://www.github.com/yourpage'],
            'youtube' => ['name' => 'Youtube', 'type' => 'url', 'icon' => 'uni-youtube-o', 'label' => 'Youtube', 'placeholder' => 'https://www.youtube.com/yourpage'],
            'tiktok' => ['name' => 'Tiktok', 'type' => 'url', 'icon' => 'uni-tiktok-o', 'label' => 'Tiktok', 'placeholder' => 'https://www.tiktok.com/yourpage'],
            'pinterest' => ['name' => 'Pinterest', 'type' => 'url', 'icon' => 'uni-pinterest-o', 'label' => 'Pinterest', 'placeholder' => 'https://www.pinterest.com/yourpage'],
            'snapchat' => ['name' => 'Snapchat', 'type' => 'url', 'icon' => 'uni-snapchat-o', 'label' => 'Snapchat', 'placeholder' => 'https://www.snapchat.com/yourpage'],
            'tumblr' => ['name' => 'Tumblr', 'type' => 'url', 'icon' => 'uni-tumblr-o', 'label' => 'Tumblr', 'placeholder' => 'https://www.tumblr.com/yourpage'],
            'reddit' => ['name' => 'Reddit', 'type' => 'url', 'icon' => 'uni-reddit-o', 'label' => 'Reddit', 'placeholder' => 'https://www.reddit.com/yourpage'],
            'vimeo' => ['name' => 'Vimeo', 'type' => 'url', 'icon' => 'uni-vimeo-o', 'label' => 'Vimeo', 'placeholder' => 'https://www.vimeo.com/yourpage'],
            'vk' => ['name' => 'VK', 'type' => 'url', 'icon' => 'uni-vk-o', 'label' => 'VK', 'placeholder' => 'https://www.vk.com/yourpage'],
            'twitch' => ['name' => 'Twitch', 'type' => 'url', 'icon' => 'uni-twitch-o', 'label' => 'Twitch', 'placeholder' => 'https://www.twitch.com/yourpage'],
            'discord' => ['name' => 'Discord', 'type' => 'url', 'icon' => 'uni-discord-o', 'label' => 'Discord', 'placeholder' => 'https://www.discord.com/yourpage'],
            'telegram' => ['name' => 'Telegram', 'type' => 'url', 'icon' => 'uni-telegram-o', 'label' => 'Telegram', 'placeholder' => 'https://www.telegram.com/yourpage'],
            'skype' => ['name' => 'Skype', 'type' => 'url', 'icon' => 'uni-skype-o', 'label' => 'Skype', 'placeholder' => 'https://www.skype.com/yourpage'],
            'line' => ['name' => 'Line', 'type' => 'url', 'icon' => 'uni-line-o', 'label' => 'Line', 'placeholder' => 'https://www.line.com/yourpage'],
            'slack' => ['name' => 'Slack', 'type' => 'url', 'icon' => 'uni-slack-o', 'label' => 'Slack', 'placeholder' => 'https://www.slack.com/yourpage'],
            'messenger' => ['name' => 'Messenger', 'type' => 'url', 'icon' => 'uni-messenger-o', 'label' => 'Messenger', 'placeholder' => 'https://www.messenger.com/yourpage'],
            'email' => ['name' => 'Email', 'type' => 'email', 'icon' => 'uni-envelope-o', 'label' => 'Email', 'placeholder' => 'cP9nF@example.com'],
            'phone' => ['name' => 'Phone', 'type' => 'tel', 'icon' => 'uni-phone-o', 'label' => 'Phone', 'placeholder' => '+1 234 567 8901'],
            'website' => ['name' => 'Website', 'type' => 'url', 'icon' => 'uni-link-o', 'label' => 'Website', 'placeholder' => 'https://www.example.com'],
            'address' => ['name' => 'Address', 'type' => 'text', 'icon' => 'uni-map-marker-alt-o', 'label' => 'Address', 'placeholder' => '123 Main St, Anytown, USA', 'placeholder_url' => 'https://maps.app.goo.gl/W7Ajpgiv65MQfYRt8'],
            'address_url' => ['name' => 'Address URL', 'type' => 'url', 'icon' => 'uni-map-marker-alt-o', 'label' => 'Address URL', 'placeholder' => 'https://maps.app.goo.gl/W7Ajpgiv65MQfYRt8'],
        ];

        return $data;
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
