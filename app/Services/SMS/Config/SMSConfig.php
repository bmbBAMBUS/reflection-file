<?php


namespace App\Services\SMS\Config;


class SMSConfig
{
    public string $baseUrl;
    public string $secret;
    public int $shortCode;
    public string $strategy;

    public function __construct()
    {
        $this->baseUrl = config('sms.url');
        $this->secret = config('sms.secret');
        $this->shortCode = (int) config('sms.short_code');
        $this->strategy = config('sms.strategy');
    }
}
