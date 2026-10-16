<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Actions;
use Filament\Actions\Action;
use Filament\Schemas\Components\Utilities\Get;
use Exception;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use App\Mail\MyTestEmail;


class Smtp extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('smtp')
            ->label(__('SMTP Settings'))
            ->icon('heroicon-o-information-circle')
            ->schema([
                Group::make()
                ->columns(2)
                ->columnSpanFull()
                ->schema([
                    Toggle::make('smtp.is_active')
                        ->label(__('Show SMTP Section'))
                        ->reactive()
                        ->inline()
                        ->default(true),
                ]),
                Section::make(__('SMTP Mailer Settings'))
                    ->columns(2)
                    ->description(__('Add SMTP Mailer Settings in order to send emails using your own email provider. (Example: smtp.mailgun.org'))
                    ->icon('heroicon-o-information-circle')
                    ->collapsed(true)
                    ->schema([
                    TextInput::make('smtp.host')
                        ->label(__('SMTP Host'))
                        ->default('smtp.mailgun.org')
                        ->placeholder('smtp.mailgun.org')
                        ->maxLength(100)
                        ->required(),
                    TextInput::make('smtp.port')
                        ->label(__('SMTP Port'))
                        ->default('587')
                        ->placeholder('587')
                        ->numeric()
                        ->minValue(20)
                        ->maxValue(65535)
                        ->required(),
                    TextInput::make('smtp.username')
                        ->label(__('SMTP Username'))
                        ->default('username')
                        ->placeholder('username')
                        ->maxLength(100)
                        ->required(),
                    TextInput::make('smtp.password')
                        ->label(__('SMTP Password'))
                        ->default('password')
                        ->password()
                        ->revealable()                    
                        ->maxLength(100)
                        ->required(),
                    TextInput::make('smtp.from_email')
                        ->label(__('SMTP From Email'))
                        ->default('info@domain')
                        ->placeholder('info@domain')
                        ->email()
                        ->maxLength(100)
                        ->required(),
                    TextInput::make('smtp.from_name')
                        ->label(__('SMTP From Name'))
                        ->default('My Company')
                        ->placeholder('My Company')
                        ->maxLength(100)
                        ->required(),
                    TextInput::make('smtp.encryption')
                        ->label(__('SMTP Encryption'))
                        ->datalist(['tls', 'ssl', 'none'])
                        ->default('tls')
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('smtp.test_email')
                        ->label(__('Email To receive Test Emails'))
                        ->default('test@example.com')
                        ->email()
                        ->maxLength(100)
                        ->required(),
                    Actions::make([
                        Action::make('test.smtp')
                        ->label('Send Test Email')
                        ->color('success')
                        ->icon('heroicon-o-sparkles')
                        ->action(function (Get $get) {
                            $mailer = Mail::build([
                                'transport' => 'smtp',
                                'host' => $get('smtp.host'), 
                                'port' => $get('smtp.port'),
                                'encryption' => $get('smtp.encryption'),
                                'username' => $get('smtp.username'),
                                'password' => $get('smtp.password'),
                                'timeout' => 5,
                            ]);

                            $data = [
                                'from_email' => $get('smtp.from_email'),
                                'from_name' => $get('smtp.from_name'),
                                'to_email' => $get('smtp.test_email'),
                                'cc_email' => $get('smtp.from_email'),
                                'bcc_email' => $get('smtp.from_email'),
                                'reply_to_email' => $get('smtp.from_email'),
                                'return_path_email' => $get('smtp.from_email'),
                                'subject' => 'Test Email',
                                'name' => 'Test User',
                                'body' => 'Test Email Body',
                            ];
                            $mailable = new MyTestEmail($data);
                                
                            try{
                                $send = $mailer->send($mailable);
                                Notification::make()
                                    ->title('Test Email Sent Successfully')
                                    ->success()
                                    ->send();
                            } catch (Exception $e) {
                                //dd($e);
                                Notification::make()
                                    ->title('Error')
                                    ->danger()
                                    ->body($e->getMessage())
                                    ->send();
                            }
                            

                        }),
                    ])

                ]),

            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}