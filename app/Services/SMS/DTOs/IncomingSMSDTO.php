<?php

namespace App\Services\SMS\DTOs;

use App\Services\Contact\DTOs\NewContactDTO;
use App\Services\Contact\Exceptions\IncorrectDTO;
use Carbon\Carbon;

class IncomingSMSDTO
{
    public ?string $request_uuid;
    public ?string $type;
    public ?string $phone_number;
    public ?string $short_code;
    public ?string $message_type;
    public ?string $message_content;
    public ?string $keyword;
    public ?Carbon $submitted_at;
    public ?Carbon $received_at;

    /**
     * @param string|null $request_uuid
     * @param string|null $type
     * @param string|null $phone_number
     * @param string|null $short_code
     * @param string|null $message_type
     * @param string|null $message_content
     * @param string|null $keyword
     * @param Carbon|null $submitted_at
     * @param Carbon|null $received_at
     */
    public function __construct(?string $request_uuid, ?string $type, ?string $phone_number, ?string $short_code, ?string $message_type, ?string $message_content, ?string $keyword, ?Carbon $submitted_at, ?Carbon $received_at)
    {
        $this->request_uuid = $request_uuid;
        $this->type = $type;
        $this->phone_number = $phone_number;
        $this->short_code = $short_code;
        $this->message_type = $message_type;
        $this->message_content = $message_content;
        $this->keyword = $keyword;
        $this->submitted_at = $submitted_at;
        $this->received_at = $received_at;
    }


    /**
     * @param array $data
     * @return static
     */
    public static function fromWebhook(array $data): static
    {
        return new static(
            $data['request_uid'],
            $data['type'],
            $data['data']['phone_number'],
            $data['data']['short_code'],
            $data['data']['message_type'],
            $data['data']['message_content'],
            $data['data']['keyword'],
            Carbon::createFromTimeString($data['data']['submitted_at']),
            Carbon::createFromTimeString($data['data']['received_at'])
        );
    }

    /**
     * @return NewContactDTO
     * @throws IncorrectDTO
     */
    public function toNewContactDto(): NewContactDTO
    {
        return new NewContactDTO(['phone' => $this->phone_number, 'external_id' => $this->request_uuid]);
    }

    /**
     * @return array[]
     */
    public function toNotificationArray(): array
    {
        return [
            [
                'name' => 'phone',
                'values' => [
                    $this->phone_number
                            ]
            ]
        ];
    }
}