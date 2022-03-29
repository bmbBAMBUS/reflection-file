<?php


namespace App\Services\SMS;


use App\Services\SMS\DTOs\SMSDTO;
use App\Services\SMS\Enums\SMSStatus;

interface SmsServiceInterface
{
    public function sendSms(SMSDTO $SMSDTO): SMSStatus;
}
