<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

abstract class WinlocalNotification extends Notification
{

    public static function fromAction(string $action): WinlocalNotification
    {
        return new WinlocalNotification();
    }
}
