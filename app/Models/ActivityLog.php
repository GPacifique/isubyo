<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'description',
        'data',
        'ip_address',
        'user_agent',
        'performed_at',
    ];

    protected $casts = [
        'data' => 'json',
        'performed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user who performed the action
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get formatted timestamp as dd/hh/mm/ss
     */
    public function getFormattedTimeAttribute(): string
    {
        return $this->performed_at->format('d/H:i:s');
    }
}
