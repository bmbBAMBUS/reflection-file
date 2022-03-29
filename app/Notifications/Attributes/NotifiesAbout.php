<?php

namespace App\Notifications\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class NotifiesAbout
{
    public function __construct( public string $subject) {}
}
