<?php


namespace App\Facades;


use App\Services\SMS\DTOs\SMSDTO;
use App\Services\SMS\Enums\SMSStatus;
use App\Services\SMS\SmsServiceInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static SMSStatus sendSms(SMSDTO $SMSDTO)
 */
class SMS extends Facade
{
    protected static function getFacadeAccessor(): string
    { return SmsServiceInterface::class; }
}
