<?php

namespace App\Notifications\Resolvers;

use App\Common\Reflection\ReflectionFile;
use App\Notifications\Attributes\NotifiesAbout;
use App\Notifications\Attributes\Validates;
use App\Notifications\Validators\Validator;
use App\Notifications\WinlocalNotification;
use Illuminate\Support\Facades\File;

trait Resolves
{
    public function resolve(string $subject, array $payload): ?object
    {
        $pathToSearch = $this->getResolvingPath();
        $files = File::allFiles($pathToSearch);


        foreach ($files as $file)
        {
            $reflection = new ReflectionFile($file->getRealPath());

            $reflected = $reflection->getAttributes($this->getResolvingAttribute());
            if( !$reflected ) continue;

            if ($reflected && $reflected[0]->getArguments()[0] === $subject) {
                return $reflection->newInstance($subject, $payload);
            }
        }

        return null;
    }
}
