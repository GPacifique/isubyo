<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SocialSupportPeriod extends Model
{
    protected $fillable = [
        'group_id',
        'name',
        'start_date',
        'end_date',
        'contribution_amount',
        'total_collected',
        'total_disbursed',
        'total_distributed',
        'expected_contributors',
        'actual_contributors',
        'status',
        'notes',
        'created_by',
        'closed_by',
        'closed_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'contribution_amount' => 'decimal:2',
        'total_collected' => 'decimal:2',
        'total_disbursed' => 'decimal:2',
        'total_distributed' => 'decimal:2',
        'closed_at' => 'datetime',
    ];

    // Relationships
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function contributions(): HasMany
    {
        return $this->hasMany(SocialSupportContribution::class, 'period_id');
    }

    public function distributions(): HasMany
    {
        return $this->hasMany(SocialSupportDistribution::class, 'period_id');
    }

    public function supports(): HasMany
    {
        return $this->hasMany(SocialSupport::class, 'period_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function closedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'closed_by');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOpen($query)
    {
        return $query->whereIn('status', ['active', 'collecting', 'disbursing']);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed');
    }

    // Helpers
    public function isActive(): bool
    {
        return in_array($this->status, ['active', 'collecting', 'disbursing', 'distributing']);
    }

    public function isClosed(): bool
    {
        return $this->status === 'closed';
    }

    public function getRemainingBalance(): float
    {
        return (float) $this->total_collected - (float) $this->total_disbursed - (float) $this->total_distributed;
    }

    public function getContributionProgress(): int
    {
        if ($this->expected_contributors <= 0) {
            return 0;
        }
        return (int) round(($this->actual_contributors / $this->expected_contributors) * 100);
    }

    public static function getStatusLabel(string $status): string
    {
        return match($status) {
            'active' => '🟢 Active',
            'collecting' => '💰 Collecting',
            'disbursing' => '💸 Disbursing',
            'distributing' => '🔄 Distributing',
            'closed' => '✅ Closed',
            default => ucfirst($status),
        };
    }

    public static function getStatusColor(string $status): string
    {
        return match($status) {
            'active' => 'bg-green-100 text-green-800',
            'collecting' => 'bg-blue-100 text-blue-800',
            'disbursing' => 'bg-yellow-100 text-yellow-800',
            'distributing' => 'bg-purple-100 text-purple-800',
            'closed' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}
