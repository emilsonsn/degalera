<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumComment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(ForumPost::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reports(): HasMany
    {
        return $this->morphMany(ForumReport::class, 'reportable');
    }
}
