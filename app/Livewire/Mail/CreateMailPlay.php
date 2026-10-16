<?php

namespace App\Livewire\Mail;

use App\Models\Email;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\On;


class CreateMailPlay extends Component
{

    public Email $emailmodel;
    public ?array $data = [];
    public? string $first_name;
    public? string $last_name;
    public? string $email;
    public? string $phone;
    public? string $subject;
    public? string $message;
    public? string $success_message;
    public? string $error_message;
    public? string $status = null;
    public bool $auto_responder_sent = false;
    public? string $page_slug;

    #[Reactive]
    public? int $page_id;

    #[Reactive]
    public? string $page_layout;

    #[Reactive]
    public? int $user_id;

    #[Reactive]
    public? string $source;

    #[Reactive]
    public? string $direction;

    public mixed $record;
    public ?string $notification = null;
    public ?string $notificationType = null;

    public function mount($page_slug = null, $page_id = null, $page_layout = null, $user_id = null, $source = null, $direction = null): void
    {
        $this->page_slug = $page_slug;
        $this->page_id = $page_id;
        $this->page_layout = $page_layout;
        $this->user_id = $user_id;
        $this->source = $source;
        $this->direction = $direction;
        $this->success_message = '';
        $this->error_message = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';
        $this->status = null;
        $this->auto_responder_sent = false;
        $this->notification = null;
        $this->notificationType = null;
    }

    #[On('create')]
    public function handleCreate(): void
    {
        $this->create();
    }
    
    public function create(): void
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
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
            $this->record = Email::create([
                'user_id' => $this->user_id,
                'page_id' => $this->page_id,
                'first_name' => $this->first_name,
                'last_name' => '',
                'email' => $this->email,
                'phone' => $this->phone,
                'subject' => '',
                'message' => $this->message,
                'source' => $this->source,
                'direction' => $this->direction,
                'status' => $this->status,
                'auto_responder_sent' => $this->auto_responder_sent,
            ]);

            $this->reset('first_name', 'email', 'phone', 'message');

            // Set success notification
            $this->notification = 'Message sent successfully!';
            $this->notificationType = 'success';

        } catch (Exception $e) {

            // Set error notification
            $this->notification = 'Error sending message. Please try again.';
            $this->notificationType = 'error';

            Log::error($e->getMessage());

            $this->reset('first_name', 'email', 'phone', 'message');

        }
    }

    public function render(): View
    {

        return view('livewire.mail.create-mail-play');

    }
}
