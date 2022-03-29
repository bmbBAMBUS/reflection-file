<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string  settingable_id
 * @property string  settingable_type
 * @property integer action_id
 * @property boolean email
 * @property boolean sms
 * @property boolean browser
 * @property string  phone_receiver
 * @property string  email_receiver
 */
class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'settingable_id',
        'settingable_type',
        'action_id',
        'email',
        'sms',
        'browser',
        'email_receiver',
        'phone_receiver',
    ];

    protected $casts = [
        'settingable_id' => 'string',
        'settingable_type' => 'string',
        'action_id' => 'integer',
        'email' => 'boolean',
        'sms' => 'boolean',
        'browser' => 'boolean',
        'email_receiver' => 'string',
        'phone_receiver' => 'string',
    ];


    /**
     * @return Attribute
     */
    protected function phoneReceiver(): Attribute
    {
        return new Attribute(
            get: fn ($value) => preg_replace('~.*(\d{1})(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+$1 ($2) $3-$4', $value),
            set: function ($value) {
                $value = preg_replace('/[^0-9]/', '', $value);
                return (strlen($value) == 10) ? '1'.$value : $value;
            }
            );
    }
}
