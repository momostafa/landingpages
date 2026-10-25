<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailResource\Pages\ListEmails;
use App\Filament\Resources\EmailResource\Pages\ViewEmail;
use App\Models\Email;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Hidden;
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

    public static function Infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::user()->id),
                TextEntry::make('page.slug')
                    ->label('Page Name'),
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
            'view' => ViewEmail::route('/{record}/view'),
        ];
    }
}
