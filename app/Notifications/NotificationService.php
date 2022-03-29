<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Notification;

class NotificationService
{
    public function send(WinlocalNotification $notification)
    {
        Notification::send([], $notification);
    }
}
