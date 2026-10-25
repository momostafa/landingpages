<?php

namespace App\Filament\Fabricator\PageBlocks\Play;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Guava\IconPicker\Forms\Components\IconPicker;
use Happenv\FilamentTranslatable\Forms\Component\Translations;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Footer extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('play.footer')
            ->visible(fn (Get $get) => $get('../layout') == 'play')
            ->icon('heroicon-o-user')
            ->schema([
                Translations::make('translations')
                    ->prefixLocaleLabel()
                    ->contained(false)
                    ->exclude([
                        'footer.is_active',
                        'footer.logo',
                        'footer.logo_link',
                        'footer.copyright_link',
                        'footer.privacy_policy_link',
                        'footer.legal_notice_link',
                        'footer.terms_service_link',
                        'footer.social_links.icon',
                        'footer.social_links.title_link',
                        'footer.about_links.title_link',
                        'footer.features_links.title_link',
                        'footer.products_links.title_link',
                        'footer.blog_links.title_link',
                        'footer.blog_links.title_image',

                    ])
                    ->schema([
                        Group::make()
                            ->schema([
                                Toggle::make('footer.is_active')
                                    ->default(true)
                                    ->reactive()
                                    ->label(__('Show Footer Section'))
                                    ->helperText(__('Show or hide the footer section on the landing Page.')),
                            ]),
                        Section::make(__('Footer Main Section'))
                            ->description(__('This section is used to display your Footer section.'))
                            ->collapsible()
                            ->collapsed(true)
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        FileUpload::make('footer.logo')
                                            ->label('Logo')
                                            ->image()
                                            ->visibility('public')
                                            ->directory('templates/media/footer')
                                            ->default('templates/play/assets/images/logo/logo-light.svg')
                                            ->required(),

                                        TextInput::make('footer.logo_link')
                                            ->label('Logo Link')
                                            ->default('#')
                                            ->required(),

                                        TextInput::make('footer.heading')
                                            ->label('Heading')
                                            ->default('We create digital experiences for brands and companies by using technology.')
                                            ->required(),

                                        TextInput::make('footer.copyright_text')
                                            ->label('Copyright Text')
                                            ->default('Designed & Developed by TailGrids & UIdeck')
                                            ->required(),

                                        TextInput::make('footer.copyright_link')
                                            ->label('Copyright Link')
                                            ->default('https://tailgrids.com')
                                            ->url()
                                            ->required(),

                                        // TextInput::make('footer.copyright_name')
                                        //     ->label('Copyright Name')
                                        //     ->default('Play')
                                        //     ->required(),

                                        TextInput::make('footer.privacy_policy')
                                            ->label('Privacy Policy')
                                            ->default('Privacy Policy')
                                            ->required(),

                                        TextInput::make('footer.privacy_policy_link')
                                            ->label('Privacy Policy Link')
                                            ->default('#')
                                            ->required(),

                                        TextInput::make('footer.legal_notice')
                                            ->label('Legal notice')
                                            ->default('Legal notice')
                                            ->required(),

                                        TextInput::make('footer.legal_notice_link')
                                            ->label('Legal notice Link')
                                            ->default('#')
                                            ->required(),

                                        TextInput::make('footer.terms_service')
                                            ->label('Terms of service')
                                            ->default('Terms of service')
                                            ->required(),

                                        TextInput::make('footer.terms_service_link')
                                            ->label('Terms of service Link')
                                            ->default('#')
                                            ->required(),

                                        Section::make(__('Footer Social Links Section'))
                                            ->description(__('Add your Footer Social Links'))
                                            ->icon('heroicon-o-sparkles')
                                            ->collapsed(true)
                                            ->schema([
                                                Repeater::make('footer.social_links')
                                                    ->label('Social Links')
                                                    ->schema([
                                                        TextInput::make('title')
                                                            ->label('Title')
                                                            ->required(),

                                                        TextInput::make('title_link')
                                                            ->label('Title Link')
                                                            ->required(),

                                                        IconPicker::make('icon')
                                                            ->label('Icon')
                                                            ->columnSpanFull()
                                                            ->searchPrompt('Search icons by name')
                                                            ->closeOnSelect()
                                                            ->required(),
                                                    ])
                                                    ->default([
                                                        [
                                                            'title' => 'Linkedin',
                                                            'title_link' => '#',
                                                            'icon' => 'uni-linkedin-o',
                                                        ],
                                                        [
                                                            'title' => 'Facebook',
                                                            'title_link' => '#',
                                                            'icon' => 'uni-facebook-f-o',
                                                        ],
                                                        [
                                                            'title' => 'Instagram',
                                                            'title_link' => '#',
                                                            'icon' => 'uni-instagram-o',
                                                        ],
                                                        [
                                                            'title' => 'Twitter',
                                                            'title_link' => '#',
                                                            'icon' => 'uni-twitter-o',
                                                        ],
                                                        [
                                                            'title' => 'Email',
                                                            'title_link' => '#',
                                                            'icon' => 'uni-envelope-o',
                                                        ],
                                                    ])
                                                    ->grid(2)
                                                    ->columnSpanFull(),
                                            ])->columns(2),
                                    ]),

                                Section::make(__('Footer About Us Links Section'))
                                    ->description(__('Add your Footer About Us Links'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->schema([
                                        TextInput::make('footer.about_us')
                                            ->label('Section Name')
                                            ->default('About Us')
                                            ->required(),
                                        Repeater::make('footer.about_links')
                                            ->label('Footer About Us Links')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),

                                                TextInput::make('title_link')
                                                    ->label('Title Link')
                                                    ->required(),
                                            ])
                                            ->default([
                                                [
                                                    'title' => 'Home',
                                                    'title_link' => '#home',
                                                ],
                                                [
                                                    'title' => 'Features',
                                                    'title_link' => '#Features',
                                                ],
                                                [
                                                    'title' => 'About',
                                                    'title_link' => '#about',
                                                ],
                                                [
                                                    'title' => 'Testimonial',
                                                    'title_link' => '#testimonial',
                                                ],
                                            ])
                                            ->grid(2)
                                            ->columnSpanFull(),
                                        // ])->columns(2),
                                    ]),

                                Section::make(__('Footer Features Links Section'))
                                    ->description(__('Add your Footer Features Links'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->schema([
                                        TextInput::make('footer.features')
                                            ->label('Section Name')
                                            ->default('Features')
                                            ->required(),
                                        Repeater::make('footer.features_links')
                                            ->label('Footer Features Links')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),

                                                TextInput::make('title_link')
                                                    ->label('Title Link')
                                                    ->required(),
                                            ])
                                            ->default([
                                                [
                                                    'title' => 'How it works',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'title' => 'Privacy policy',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'title' => 'Terms of Service',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'title' => 'Refund policy',
                                                    'title_link' => '#',
                                                ],
                                            ])
                                            ->grid(2)
                                            ->columnSpanFull(),
                                        // ])->columns(2),
                                    ]),

                                Section::make(__('Footer Our Products Links Section'))
                                    ->description(__('Add your Footer Our Products Links'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->schema([
                                        TextInput::make('footer.products')
                                            ->label('Section Name')
                                            ->default('Our Products')
                                            ->required(),
                                        Repeater::make('footer.products_links')
                                            ->label('Footer Our Products Links')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),

                                                TextInput::make('title_link')
                                                    ->label('Title Link')
                                                    ->required(),
                                            ])
                                            ->default([
                                                [
                                                    'title' => 'LineIcons',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'title' => 'Ecommerce HTML',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'title' => 'TailAdmin',
                                                    'title_link' => '#',
                                                ],
                                                [
                                                    'title' => 'PlainAdmin',
                                                    'title_link' => '#',
                                                ],
                                            ])
                                            ->grid(2)
                                            ->columnSpanFull(),
                                        // ])->columns(2),
                                    ]),

                                Section::make(__('Footer Latest blog Links Section'))
                                    ->description(__('Add your Footer Latest blog Links'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed(true)
                                    ->schema([
                                        TextInput::make('footer.blog')
                                            ->label('Section Name')
                                            ->default('Latest blog')
                                            ->required(),
                                        Repeater::make('footer.blog_links')
                                            ->label('Footer Latest blog Links')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),
                                                TextInput::make('title_link')
                                                    ->label('Title Link')
                                                    ->required(),
                                                FileUpload::make('image')
                                                    ->label('Image')
                                                    ->image()
                                                    ->visibility('public')
                                                    ->directory('templates/media/play/footer'),
                                            ])
                                            ->default([
                                                [
                                                    'title' => 'I think really important to design with...',
                                                    'title_link' => '#blog',
                                                    'image' => ['templates/play/assets/images/blog/blog-footer-01.jpg'],
                                                ],
                                                [
                                                    'title' => 'The rise of Ecommerce...',
                                                    'title_link' => '#blog',
                                                    'image' => ['templates/play/assets/images/blog/blog-footer-02.jpg'],

                                                ],
                                            ])
                                            ->grid(2)
                                            ->columnSpanFull(),
                                        // ])->columns(2),
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
