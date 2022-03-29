<?php

namespace App\Notifications\Resolvers;

use App\Notifications\Attributes\TriggeredBy;

class ActionResolver extends Resolver
{
    protected function getResolvingPath(): string
    {
        return app_path('Notifications/Actions');
    }

    protected function getResolvingAttribute(): string
    {
        return TriggeredBy::class;
    }
}
