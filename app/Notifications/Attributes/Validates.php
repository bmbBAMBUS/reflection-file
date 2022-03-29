<?php

namespace App\Notifications\Attributes;

use App\Event\SqsEvent;
use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Validates
{
    public function __construct( public string $subject) {}
}
