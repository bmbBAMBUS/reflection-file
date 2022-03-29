<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Rawaby88\Portal\Portable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Portable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setToken($token): void
    {
        $this->token = $token;
    }

    public function actionSetting(string $action): ?Settings
    {
        return $this->settings()->where('action', $action)->first();
    }

    public function settings(): MorphOne
    {
        return $this->morphOne(Settings::class, 'settingable');
    }
}
