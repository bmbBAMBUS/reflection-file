<?php

namespace App\Notifications\Notifications\Workspace;

use App\Models\Action;
use App\Notifications\Attributes\NotifiesAbout;
use App\Notifications\Messages\SmsMessage;
use App\Notifications\WinlocalNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

#[NotifiesAbout(Action::WORKSPACE_STATUS_DEACTIVATED)]
class WorkspaceStatusDeactivated extends WinlocalNotification
{
    use Queueable;

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line(__('notifications.greetings'))
            ->line(__('notifications.workspace.status.deactivated', ['name', $this->payload['context']['name']]))
            ->replyTo($this->getRecipientEmail());
    }

    public function toSms($notifiable)
    {
        return (new SmsMessage())
            ->line(__('notifications.greetings'))
            ->line(__('notifications.workspace.status.deactivated', ['name', $this->payload['context']['name']]))
            ->replyTo($this->getRecipientPhone());

    }

    public function toArray($notifiable)
    {
        return [
            'lines' => [
                __('notifications.greetings'),
                __('notifications.workspace.status.deactivated', ['name', $this->payload['context']['name']]),
            ],
        ];
    }
}
