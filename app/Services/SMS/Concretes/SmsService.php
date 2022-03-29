<?php


namespace App\Services\SMS\Concretes;


use App\Services\SMS\Config\SMSConfig;
use App\Services\SMS\DTOs\SMSDTO;
use App\Services\SMS\Enums\SMSStatus;
use App\Services\SMS\SmsServiceInterface;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsService implements SmsServiceInterface
{
    public function __construct(
        private SMSConfig $config
    ){}

    public function sendSms(SMSDTO $SMSDTO): SMSStatus
    {
        try{
            $response = Http::post(
                $this->config->baseUrl.'/api/v1/sms/send',
                [
                    'destination' => $SMSDTO->phoneNumber,
                    'message' => $SMSDTO->message,
                    'short_code' => $this->config->shortCode
                ]
            );

            return SMSStatus::ok();
        } catch (ClientException $exception){
            return SMSStatus::error();
        }
    }

    protected function resolveAccessToken(): string
    {
        return 'Basic '.$this->config->secret;
    }

}
