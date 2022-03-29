<?php

namespace App\Notifications\Messages;

use App\Facades\SMS;
use App\Services\SMS\DTOs\SMSDTO;

class SmsMessage
{
    protected string $to;
    protected string $line;

    public function line(string $line = ''): self
    {
        $this->line .= ' '.$line;

        return $this;
    }

    public function replyTo($to): self
    {
        $this->to = $to;

        return $this;
    }

    public function send(): mixed
    {
        if (!$this->to || strlen($this->line) < 1) {
            throw new \Exception('SMS is not correct.');
        }


        SMS::sendSms(new SMSDTO($this->to, $this->line));
    }

    public function dryrun($dry = 'yes'): self
    {
        $this->dryrun = $dry;

        return $this;
    }
}
