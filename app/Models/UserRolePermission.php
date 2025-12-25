<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRolePermission extends Pivot
{
    protected $table = 'user_role_permissions';

    protected $fillable = [
        'user_id',
        'role_id',
        'permission_id',
    ];

    protected $timestamps = false;
}
