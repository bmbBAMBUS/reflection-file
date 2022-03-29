<?php

namespace App\Notifications\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class TriggeredBy
{
    public function __construct( public string $subject) {}
}
