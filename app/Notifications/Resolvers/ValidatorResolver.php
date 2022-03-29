<?php

namespace App\Notifications\Resolvers;

use App\Notifications\Attributes\Validates;

class ValidatorResolver extends Resolver
{
    protected function getResolvingPath(): string
    {
        return app_path('Notifications/Validators');
    }

    protected function getResolvingAttribute(): string
    {
        return Validates::class;
    }
}
