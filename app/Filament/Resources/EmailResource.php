<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailResource\Pages\CreateEmail;
use App\Filament\Resources\EmailResource\Pages\EditEmail;
use App\Filament\Resources\EmailResource\Pages\ListEmails;
use App\Filament\Resources\EmailResource\Pages\ViewEmail;
use App\Models\Email;
use App\Models\Page;
use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class EmailResource extends Resource
{
    protected static ?string $model = Email::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function form(Schema $schema): Schema
    // {
    //     return $schema
    //         ->components([
    //             Hidden::make('user_id')
    //                 ->default(Auth::user()->id),
    //             TextInput::make('page_id')
    //                 ->numeric(),
    //             TextInput::make('source'),
    //             TextInput::make('direction'),
    //             TextInput::make('first_name'),
    //             TextInput::make('last_name'),
    //             TextInput::make('email')
    //                 ->label('Email address')
    //                 ->email(),
    //             TextInput::make('phone')
    //                 ->tel(),
    //             TextInput::make('subject'),
    //             Textarea::make('message')
    //                 ->columnSpanFull(),
    //             TextInput::make('status'),
    //             Toggle::make('auto_responder_sent'),
    //         ]);
    // }

    public static function Infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::user()->id),
                // Hidden::make('page_id')
                //     ->default(function () {
                //     $page_name = Page::where('id', 1)->first();
                //     $page_name = $page_name->slug;
                //     return $page_name;
                // }),
                TextEntry::make('page.slug')
                    ->label('Page Name'),
                // ->state('page.slug'),
                // ->state(function (Email $record) {
                //     $page_name = Page::where('id', $record->page_id)->first();
                //     $page_name = $page_name->slug;
                //   return $page_name;
                // }),

                TextEntry::make('source')
                    ->placeholder('Empty'),
                TextEntry::make('direction')
                    ->placeholder('Empty'),
                TextEntry::make('first_name')
                    ->placeholder('Empty'),
                TextEntry::make('last_name')
                    ->placeholder('Empty'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('Empty'),
                TextEntry::make('phone')
                    ->placeholder('Empty'),
                TextEntry::make('subject')
                    ->placeholder('Empty'),
                TextEntry::make('message')
                    ->placeholder('Empty')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->placeholder('Empty'),
                IconEntry::make('auto_responder_sent')
                    ->boolean()
                    ->placeholder('Empty'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('Empty'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('Empty'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('page.slug')
                    ->label('Page Name')
                    ->wrapHeader()
                    // ->numeric()
                    ->sortable(),
                TextColumn::make('source')
                    ->searchable(),
                TextColumn::make('direction')
                    ->searchable(),
                TextColumn::make('first_name')
                    ->label('First Name')
                    ->wrap()
                    ->wrapHeader()
                    ->searchable(),
                TextColumn::make('last_name')
                    ->label('Last Name')
                    ->wrap()
                    ->wrapHeader()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('subject')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                IconColumn::make('auto_responder_sent')
                    ->wrapHeader()
                    ->headerTooltip('Is Auto Responder Sent?')
                    ->label('Responder Status')
                    ->width('1%')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                //
            ])

            ->recordActions([
                // EditAction::make(),
                ViewAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmails::route('/'),
            // 'create' => CreateEmail::route('/create'),
            // 'edit' => EditEmail::route('/{record}/edit'),
            'view' => ViewEmail::route('/{record}/view'),
        ];
    }
}
