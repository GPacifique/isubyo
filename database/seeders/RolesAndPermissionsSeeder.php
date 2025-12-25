<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            // User Management
            ['name' => 'users.view', 'display_name' => 'View Users', 'description' => 'Can view all users'],
            ['name' => 'users.create', 'display_name' => 'Create Users', 'description' => 'Can create new users'],
            ['name' => 'users.edit', 'display_name' => 'Edit Users', 'description' => 'Can edit user details'],
            ['name' => 'users.delete', 'display_name' => 'Delete Users', 'description' => 'Can delete users'],
            ['name' => 'users.manage_roles', 'display_name' => 'Manage User Roles', 'description' => 'Can assign/revoke user roles'],

            // Role Management
            ['name' => 'roles.view', 'display_name' => 'View Roles', 'description' => 'Can view all roles'],
            ['name' => 'roles.create', 'display_name' => 'Create Roles', 'description' => 'Can create new roles'],
            ['name' => 'roles.edit', 'display_name' => 'Edit Roles', 'description' => 'Can edit role details'],
            ['name' => 'roles.delete', 'display_name' => 'Delete Roles', 'description' => 'Can delete roles'],
            ['name' => 'roles.manage_permissions', 'display_name' => 'Manage Role Permissions', 'description' => 'Can assign/revoke permissions to roles'],

            // Permission Management
            ['name' => 'permissions.view', 'display_name' => 'View Permissions', 'description' => 'Can view all permissions'],
            ['name' => 'permissions.create', 'display_name' => 'Create Permissions', 'description' => 'Can create new permissions'],
            ['name' => 'permissions.edit', 'display_name' => 'Edit Permissions', 'description' => 'Can edit permission details'],
            ['name' => 'permissions.delete', 'display_name' => 'Delete Permissions', 'description' => 'Can delete permissions'],

            // Group Management
            ['name' => 'groups.view', 'display_name' => 'View Groups', 'description' => 'Can view all groups'],
            ['name' => 'groups.approve', 'display_name' => 'Approve Groups', 'description' => 'Can approve pending groups'],
            ['name' => 'groups.edit', 'display_name' => 'Edit Groups', 'description' => 'Can edit group details'],
            ['name' => 'groups.delete', 'display_name' => 'Delete Groups', 'description' => 'Can delete groups'],

            // Loan Management
            ['name' => 'loans.view', 'display_name' => 'View Loans', 'description' => 'Can view all loans'],
            ['name' => 'loans.approve', 'display_name' => 'Approve Loans', 'description' => 'Can approve pending loans'],
            ['name' => 'loans.manage', 'display_name' => 'Manage Loans', 'description' => 'Can manage loan details'],

            // Reports
            ['name' => 'reports.view', 'display_name' => 'View Reports', 'description' => 'Can view system reports'],
            ['name' => 'reports.export', 'display_name' => 'Export Reports', 'description' => 'Can export reports'],

            // Settings
            ['name' => 'settings.view', 'display_name' => 'View Settings', 'description' => 'Can view system settings'],
            ['name' => 'settings.manage', 'display_name' => 'Manage Settings', 'description' => 'Can manage system settings'],
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                ['display_name' => $permission['display_name'], 'description' => $permission['description']]
            );
        }

        // Define roles with their permissions
        $rolePermissions = [
            'super_admin' => [
                // All permissions
                'users.view', 'users.create', 'users.edit', 'users.delete', 'users.manage_roles',
                'roles.view', 'roles.create', 'roles.edit', 'roles.delete', 'roles.manage_permissions',
                'permissions.view', 'permissions.create', 'permissions.edit', 'permissions.delete',
                'groups.view', 'groups.approve', 'groups.edit', 'groups.delete',
                'loans.view', 'loans.approve', 'loans.manage',
                'reports.view', 'reports.export',
                'settings.view', 'settings.manage',
            ],
            'system_admin' => [
                'users.view', 'users.create', 'users.edit', 'users.manage_roles',
                'roles.view', 'roles.edit', 'roles.manage_permissions',
                'permissions.view',
                'groups.view', 'groups.approve', 'groups.edit',
                'loans.view', 'loans.approve', 'loans.manage',
                'reports.view', 'reports.export',
                'settings.view', 'settings.manage',
            ],
            'group_admin' => [
                'groups.view',
                'loans.view', 'loans.manage',
                'reports.view',
            ],
            'auditor' => [
                'users.view',
                'groups.view',
                'loans.view',
                'reports.view', 'reports.export',
            ],
            'support_staff' => [
                'users.view',
                'groups.view',
                'loans.view',
                'reports.view',
            ],
        ];

        // Create roles and assign permissions
        foreach ($rolePermissions as $roleName => $perms) {
            $role = Role::firstOrCreate(
                ['name' => $roleName],
                [
                    'display_name' => ucwords(str_replace('_', ' ', $roleName)),
                    'description' => 'System-defined ' . str_replace('_', ' ', $roleName) . ' role',
                    'is_system' => true,
                ]
            );

            // Attach permissions to role
            $permissionIds = Permission::whereIn('name', $perms)->pluck('id')->toArray();
            $role->permissions()->sync($permissionIds);
        }
    }
}
