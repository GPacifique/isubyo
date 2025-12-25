<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    /**
     * Get all roles with this permission
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }

    /**
     * Get all users with this permission through roles
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role_permissions')
            ->using(UserRolePermission::class);
    }
}
