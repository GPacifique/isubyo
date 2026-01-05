<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialSupport extends Model
{
    protected $fillable = [
        'group_id',
        'period_id',
        'member_id',
        'type',
        'amount',
        'description',
        'status',
        'approval_notes',
        'approved_by',
        'approved_at',
        'disbursed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'approved_at' => 'datetime',
        'disbursed_at' => 'datetime',
    ];

    // Relationships
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(SocialSupportPeriod::class, 'period_id');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(GroupMember::class, 'member_id');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeDisbursed($query)
    {
        return $query->where('status', 'disbursed');
    }

    public function scopeByType($query, string $type)
    {
        return $query->where('type', $type);
    }

    // Helpers
    public static function getTypeLabel(string $type): string
    {
        return match($type) {
            'death' => '☠️ Death',
            'marriage' => '💍 Marriage',
            'sickness' => '🏥 Sickness',
            default => ucfirst($type),
        };
    }

    public static function getStatusLabel(string $status): string
    {
        return match($status) {
            'pending' => '⏳ Pending',
            'approved' => '✓ Approved',
            'rejected' => '✗ Rejected',
            'disbursed' => '💳 Disbursed',
            default => ucfirst($status),
        };
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isDisbursed(): bool
    {
        return $this->status === 'disbursed';
    }
}
