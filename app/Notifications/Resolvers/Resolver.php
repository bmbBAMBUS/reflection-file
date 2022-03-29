<?php

namespace App\Notifications\Resolvers;

abstract class Resolver
{
    use Resolves;

    const NOTIFICATION = 'Notification';
    const VALIDATOR    = 'Validator';
    const ACTION       = 'Action';

    public static function for(string $resolverType): static
    {

        $class = __NAMESPACE__.'\\'.$resolverType.'Resolver';

        return new $class();
    }

    protected function getResolvingPath(): string
    {
        throw new \InvalidArgumentException('Resolving path needs to be provided');
    }

    protected function getResolvingAttribute(): string
    {
        throw new \InvalidArgumentException('Resolving argument needs to be provided');
    }
}
