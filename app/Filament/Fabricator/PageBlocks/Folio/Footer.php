<?php

namespace App\Filament\Fabricator\PageBlocks\Folio;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Footer extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('folio.footer')
            ->visible(fn (Get $get) => $get('../layout') == 'folio')
            ->icon('heroicon-o-user')
            ->schema([
                Group::make()
                    ->schema([
                        Toggle::make('footer.is_active')
                            ->label('Show Footer Section')
                            ->reactive()
                            ->default(true)
                            ->helperText('Show or hide the Footer section on the landing Page.'),
                    ]),
                Section::make(__('Footer Section'))
                    ->description(__('This section is used to display your Footer section.'))
                    ->collapsible()
                    ->collapsed(true)
                    ->visible(fn (Get $get) => (bool) ($get('footer.is_active') ?? true))
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Group::make()
                            ->schema([
                                Section::make(__('Footer Section Details'))
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->collapsed(false)
                                    ->schema([
                                        TextInput::make('footer.copyright_name')
                                            ->label(__('Copyright Name'))
                                            ->default('Eliott')
                                            ->placeholder(__('Copyright Person Name'))
                                            ->maxLength(140),
                                        TextInput::make('footer.copyright_name_link')
                                            ->label(__('Copyright Name Link'))
                                            ->default('#')
                                            ->placeholder(__('Copyright Link URL'))
                                            ->maxLength(140),
                                        TextInput::make('footer.copyright_developer_name')
                                            ->label(__('Copyright Developer Name'))
                                            ->default('Laurent Begey')
                                            ->placeholder(__('Copyright Developer Name'))
                                            ->maxLength(140),
                                        TextInput::make('footer.copyright_developer_name_link')
                                            ->label(__('Copyright Name Link'))
                                            ->default('https://lbegey78.gumroad.com')
                                            ->placeholder(__('Copyright Link URL'))
                                            ->maxLength(140),
                                        TextInput::make('footer.copyright_developer_name2')
                                            ->label(__('Copyright Developer Name 2'))
                                            ->default('Mo Mostafa')
                                            ->placeholder(__('Copyright Developer Name 2'))
                                            ->maxLength(140),
                                        TextInput::make('footer.copyright_developer_name2_link')
                                            ->label(__('Copyright Name Link 2'))
                                            ->default('https://github.com/momostafa/landingpages')
                                            ->placeholder(__('Copyright Link URL'))
                                            ->maxLength(140),
                                        TextInput::make('footer.copyright_company')
                                            ->label(__('Copyright Company'))
                                            ->default('ThemeWagon')
                                            ->placeholder(__('Copyright Company Name'))
                                            ->maxLength(140),
                                        TextInput::make('footer.copyright_company_link')
                                            ->label(__('Copyright Company Link'))
                                            ->default('https://themewagon.com')
                                            ->placeholder(__('Copyright Company Link URL'))
                                            ->maxLength(140),
                                        TextInput::make('footer.built_with')
                                            ->label(__('Built With'))
                                            ->default('Tailwind CSS & Alpine.js')
                                            ->placeholder(__('Built With'))
                                            ->maxLength(140)
                                            ->columnSpanFull(),
                                        TextInput::make('footer.built_with_tech_1')
                                            ->label(__('Built With Tech 1'))
                                            ->default('Tailwind CSS')
                                            ->placeholder(__('Built With Tech 1'))
                                            ->maxLength(140),
                                        TextInput::make('footer.built_with_tech_1_link')
                                            ->label(__('Built With Tech 1 Link'))
                                            ->default('https://tailwindcss.com')
                                            ->placeholder(__('Built With Tech 1 Link URL'))
                                            ->maxLength(140),
                                        TextInput::make('footer.built_with_tech_2')
                                            ->label(__('Built With Tech 2'))
                                            ->default('Alpine.js')
                                            ->placeholder(__('Built With Tech 2'))
                                            ->maxLength(140),
                                        TextInput::make('footer.built_with_tech_2_link')
                                            ->label(__('Built With Tech 2 Link'))
                                            ->default('https://alpinejs.dev')
                                            ->placeholder(__('Built With Tech 2 Link URL'))
                                            ->maxLength(140),
                                        TextInput::make('footer.built_with_tech_3')
                                            ->label(__('Built With Tech 3'))
                                            ->default('Filament')
                                            ->placeholder(__('Built With Tech 3'))
                                            ->maxLength(140),
                                        TextInput::make('footer.built_with_tech_3_link')
                                            ->label(__('Built With Tech 3 Link'))
                                            ->default('https://filamentphp.com')
                                            ->placeholder(__('Built With Tech 3 Link URL'))
                                            ->maxLength(140),
                                        TextInput::make('footer.built_with_tech_4')
                                            ->label(__('Built With Tech 4'))
                                            ->default('Laravel')
                                            ->placeholder(__('Built With Tech 4'))
                                            ->maxLength(140),
                                        TextInput::make('footer.built_with_tech_4_link')
                                            ->label(__('Built With Tech 4 Link'))
                                            ->default('https://laravel.com')
                                            ->placeholder(__('Built With Tech 4 Link URL'))
                                            ->maxLength(140),
                                    ])->columns(2),
                            ]),
                    ]),

            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
