<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'gender',
        'state',
        'city',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(UserBlock::class);
    }

    public function roles(): HasMany
    {
        return $this->hasMany(UserRole::class);
    }

    public function indications(): HasMany
    {
        return $this->hasMany(Indication::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
