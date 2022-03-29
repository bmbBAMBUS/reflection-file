<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    const WORKSPACE_STATUS_DEACTIVATED    = 'workspace.status.deactivated';
    const WORKSPACE_STATUS_ACTIVATED      = 'workspace.status.activated';
    const USER_STATUS_DEACTIVATED         = 'user.status.deactivated';
    const USER_STATUS_ACTIVATED           = 'user.status.activated';
    const CAMPAIGN_SMS_RECEIVED           = 'campaign.sms.received';
    const CAMPAIGN_LEAD_RECEIVED          = 'campaign.lead.received';
    const CARD_EMAIL_UPDATED              = 'card.email.updated';
}
