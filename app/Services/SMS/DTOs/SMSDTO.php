<?php


namespace App\Services\SMS\DTOs;


class SMSDTO
{
    public function __construct(
        public string $phoneNumber,
        public string $message
    ){}
}
