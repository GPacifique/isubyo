<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialSupportDistribution extends Model
{
    protected $fillable = [
        'group_id',
        'period_id',
        'member_id',
        'amount',
        'notes',
        'distributed_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
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

    public function distributedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'distributed_by');
    }

    // Scopes
    public function scopeByGroup($query, int $groupId)
    {
        return $query->where('group_id', $groupId);
    }

    public function scopeByPeriod($query, int $periodId)
    {
        return $query->where('period_id', $periodId);
    }

    public function scopeByMember($query, int $memberId)
    {
        return $query->where('member_id', $memberId);
    }
}
