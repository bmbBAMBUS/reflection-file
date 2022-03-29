<?php

namespace App\Notifications\Validators;

use App\Notifications\Resolvers\Resolver;

abstract class Validator
{
    protected array $rules = [
        'payload.context_id'   => 'required|uuid',
        'payload.context'      => 'required|array',
        'payload.context.type' => 'required|string',
        'payload.context.name' => 'required|string',
        'payload.data'         => 'required|array',
    ];

    public function __construct(public string $subject, public array $payload)
    {
        $this->rules = array_merge($this->rules, $this->rules());
    }

    public function rules(): array
    {
        return $this->rules;
    }
}
