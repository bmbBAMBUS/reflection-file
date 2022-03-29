<?php

namespace App\Notifications\Resolvers;

use App\Notifications\Attributes\NotifiesAbout;

class NotificationResolver extends Resolver
{

    protected function getResolvingPath(): string
    {
        return app_path('Notifications/Notifications');
    }

    protected function getResolvingAttribute(): string
    {
        return NotifiesAbout::class;
    }
}
