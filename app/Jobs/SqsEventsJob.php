<?php

namespace App\Jobs;

use App\Common\Reflection\ReflectionFile;
use App\Notifications\Attributes\NotifiesAbout;
use App\Notifications\Attributes\Validates;
use App\Notifications\NotificationService;
use App\Notifications\Resolvers\Resolver;
use App\Notifications\Validators\Validator;
use App\Notifications\WinlocalNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;
use WinLocal\MessageBus\Jobs\SqsGetJob;


class SqsEventsJob extends SqsGetJob
{
    private ?WinlocalNotification $notification;
    private ?Validator $validator;

    public function __construct(string $subject, array $payload)
    {
        parent::__construct($subject, $payload);
        $this->notification = (Resolver::for(Resolver::NOTIFICATION))->resolve($subject, $payload);
        $this->validator = (Resolver::for(Resolver::VALIDATOR))->resolve($subject, $payload);
        $this->action = (Resolver::for(Resolver::ACTION))->resolve($subject, $payload);
    }

    public function handle()
    {
        $validator = LaravelValidator::make($this->payload, $this->validator->rules());
        if($validator->fails()) {
            exit(Command::FAILURE);
        }

        if($this->action) {
            $this->action($this->payload, $this->notification);
        }

        (new NotificationService)->send($this->notification);
    }


}
