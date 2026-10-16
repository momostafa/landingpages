<?php

namespace App\Livewire\Mail;

use Livewire\Component;
use Livewire\Attributes\Reactive;
use App\Models\Email;
use App\Models\User;
use App\Notifications\NewMailNotification;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Illuminate\Support\Lottery;



class PortfolioContactUs extends Component
{

    public ?array $data = [];
    public? string $first_name;
    public? string $last_name;
    public? string $email;
    public? string $phone;
    public? string $subject;
    public? string $message;
    public? string $success_message;
    public? string $error_message;
    public mixed $lottery;
    public mixed $winners = null;
    public mixed $losers = null;
    public mixed $total_winners = null;
    public mixed $total_losers = null;
    public mixed $total_players = null;
    public mixed $chose = null;
    public bool $portfolio_check = false;
    public? string $status = null;
    public bool $auto_responder_sent = false;
    public? string $page_slug;

    #[Reactive]
    public? int $page_id;

    #[Reactive]
    public? int $user_id;

    #[Reactive]
    public? string $source;

    #[Reactive]
    public? string $direction;

    public function mount(): void
    {
        $this->winners = null;
        $this->losers = null;
        $this->total_winners = null;
        $this->total_losers = null;
        $this->total_players = null;
        $this->chose = null;
        $this->portfolio_check = false;
        $this->success_message = '';
        $this->error_message = '';
        $this->first_name = 'John';
        $this->last_name = 'Doe';
        $this->email = 'john.doe@example.com';
        $this->phone = '+1234567890';
        $this->subject = 'Test Subject';
        $this->message = 'This is a test message';
        $this->status = null;
        $this->auto_responder_sent = false;
    }
    public function processSelection($data)
    {
        //dd($data['value']);
        $value = $data['value']; // Selected value (e.g., 'small')
        if ($value == $this->total_winners) {
            $this->contactUs();
        } else {
            LivewireAlert::title('Error')
            ->position(Position::CenterStart)
            ->text('Number of winners is incorrect. Please try again.')
            ->error()
            ->withOptions([
                'width' => '400px',
                'theme' => 'auto',
                'background' => 'red',
                'color' => 'white',
                'timer' => 3000,
                'toast' => true,
                'animation' => false,
            ])
            ->show();
        }
    }

    public function contactUsValidation()
    {
        $chose = [5, 7, 6, 4, 3, 1, 9, 0, 8];
        $chose = $chose[array_rand($chose)];
        $lottery = Lottery::odds(10, 20)
        ->winner(fn () => $this->winners []= 'Winner')
        ->loser(fn () => $this->losers []= 'Loser ')
        ->choose($chose);

        $this->total_players = $chose;
        $this->total_winners = count($this->winners);
        $this->total_losers = $this->total_players - $this->total_winners;

       $contact_us_validation = LivewireAlert::title('Validation Quizz')
        ->html('<p> A Total of: '.$this->total_players.' players had a competition. '.$this->total_losers.' lost how many won? </p>')
        ->info()
        ->toast(false)
        ->withOptions([
        'input' => 'select',
        'inputOptions' => [
            $this->total_winners => $this->total_winners . ' Winners',
            $this->total_losers => $this->total_losers . ' Losers',
        ],
        'inputPlaceholder' => 'Select The Correct Answer',
        ])
        ->asConfirm()
        ->onConfirm('processSelection') //without $data
        ->onDeny('processSelection', ['value' => 'losers'])
        ->show();
    }

    public function contactUs(): void
    {

        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1200',
        ]);


        if($this->source == 'contact_form'){
            $this->direction = 'inbound';
            $this->status = 'pending';
            $this->source = 'contact_form';
        } else {
            $this->direction = 'outbound';
            $this->status = 'sent';
            $this->source = '';
        }

        try {
            $record = Email::create([
                'user_id' => $this->user_id,
                'page_id' => $this->page_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'subject' => $this->subject,
                'message' => $this->message,
                'source' => $this->source,
                'direction' => $this->direction,
                'status' => $this->status,
                'auto_responder_sent' => $this->auto_responder_sent,
            ]);

            $this->reset('first_name', 'last_name', 'email', 'phone', 'subject', 'message'); //good

            $success_alert = LivewireAlert::title('Success')
            ->position(Position::CenterStart)
            ->text('Message sent successfully')
            ->success()
            ->withOptions([
                'width' => '400px',
                'theme' => 'auto',
                'background' => 'green',
                'color' => 'white',
                'timer' => 5000,
                'toast' => true,
                'animation' => false,
            ])
            ->show();
            

        } catch (Exception $e) {

            $error_alert = LivewireAlert::title('Error')
            ->position(Position::CenterStart)
            ->text('Error sending message.'.$e->getMessage())
            ->error()
            ->withOptions([
                'width' => '400px',
                'theme' => 'auto',
                'background' => 'red',
                'color' => 'white',
                'timer' => 5000,
                'toast' => true,
                'animation' => false,
            ])
            ->show();

            Log::error($e->getMessage());
            
            $this->reset('first_name', 'last_name', 'email', 'phone', 'subject', 'message');

        }
    }


    public function render(): View
    {
        return view('livewire.mail.portfolio-contact-us');
    }
}
