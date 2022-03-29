<?php

namespace App\Notifications\Actions;

use App\Models\Action;
use App\Notifications\Attributes\TriggeredBy;

#[TriggeredBy(Action::CARD_EMAIL_UPDATED)]
class UpdateShareCardEmail
{
    public function __construct(
        public string $subject,
        public array  $payload
    ) {}

    public function __invoke()
    {

    }
}
