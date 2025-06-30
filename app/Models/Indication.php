<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Indication extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'name',
        'address',
        'reference',
        'phone',
        'website',
        'photos',
        'attractives',
        'event_day',
        'event_time',
        'host_name',
    ];

    protected $casts = [
        'photos' => 'array',
        'attractives' => 'array',
        'event_day' => 'date',
        'event_time' => 'datetime:H:i',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
