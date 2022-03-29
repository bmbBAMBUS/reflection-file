<?php

namespace App\Notifications\Notifications\Workspace;

use App\Models\Action;
use App\Notifications\Attributes\NotifiesAbout;
use App\Notifications\WinlocalNotification;

#[NotifiesAbout(Action::WORKSPACE_STATUS_ACTIVATED)]
class WorkspaceStatusActivated extends WinlocalNotification
{

}
