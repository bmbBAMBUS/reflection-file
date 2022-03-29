<?php

namespace App\Notifications;

use App\Models\Settings;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Notifications\Notification;

abstract class WinlocalNotification extends Notification
{
    private $notifiable;
    private ?Settings $settings;

    public function __construct(
        public string $subject,
        public array  $payload
    )
    {
        $this->notifiable = User::find($this->payload['context_id']) ?? Workspace::find($this->payload['context_id']);
        $this->settings = Settings::where([
            ['action', $this->subject],
            ['settingable_id', $this->payload['context_id']],
            ['settingable_type', ucfirst($this->payload['context']['type'])]
        ])->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if($this->settings?->email) {
            $channels[] = 'email';
        }

        if($this->settings?->sms) {
            $channels[] = 'sms';
        }

        if($this->settings?->browser) {
            $channels = array_merge($channels, ['broadcast', 'database']);
        }

        return $channels;
    }

    /**
     * @return string|null
     */
    protected function getRecipientEmail(): ?string
    {
        // Forced receiver
        if(isset($this->payload['receiver']['email'])) {
            return $this->payload['receiver']['email'];
        }

        // Settings receiver
        $email = $this->settings?->email_receiver;

        // Default receiver
        if(!$email) {
             if($this->notifiable instanceof User) {
                 $email = (User::find($this->payload['context_id']))?->email;
             } else {
                 $email = null;
             }
        }

        return $email;
    }

    /**
     * @return string|null
     */
    protected function getRecipientPhone(): ?string
    {
        // Forced receiver
        if(isset($this->payload['receiver']['phone'])) {
            return $this->payload['receiver']['phone'];
        }

        // Settings receiver
        $phone = $this->settings?->getOriginal('phone_receiver');

        // Default receiver
        if(!$phone) {
            if($this->notifiable instanceof User) {
                $phone = (User::find($this->payload['context_id']))?->phone;
            }
        }

        return $phone;
    }
}
