<?php

namespace App\Notifications\Validators\Workspace;

use App\Models\Action;
use App\Notifications\Attributes\Validates;
use App\Notifications\Validators\Validator;

#[Validates(Action::WORKSPACE_STATUS_DEACTIVATED)]
class WorkspaceStatusDeactivatedValidator extends Validator
{
    public function __construct(public string $subject, public array $payload)
    {
        parent::__construct($subject, $payload);
        $this->rules['payload.data.deactivated_at'] = 'required|date';
    }
}
