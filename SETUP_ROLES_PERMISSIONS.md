# Role & Permission Management Setup Guide

## Quick Start

### 1. Run Migrations

Execute the migration to create the required database tables:

```bash
php artisan migrate
```

This creates:
- `roles` table
- `permissions` table
- `role_permissions` table
- `user_roles` table
- `user_role_permissions` table

### 2. Seed Default Roles and Permissions

Populate the database with predefined roles and permissions:

```bash
php artisan db:seed --class=RolesAndPermissionsSeeder
```

**Default Roles Created:**
- **Super Admin** - Full system access
- **System Admin** - Administrative functions
- **Group Admin** - Group-level management
- **Auditor** - Read-only access
- **Support Staff** - Limited support access

### 3. Access the Feature

1. Log in as a system admin (user with `is_admin = true`)
2. Navigate to the Admin Dashboard
3. You'll see new menu items:
   - **Manage Roles** - Create/edit/delete roles
   - **Manage Permissions** - Create/edit/delete permissions
   - **Manage User Roles** - Assign roles to users

## How to Use

### Create a New Role

1. Go to Admin → Manage Roles
2. Click "Create Role"
3. Enter:
   - **Role Name**: Unique identifier (e.g., `content_editor`)
   - **Display Name**: Human-readable (e.g., `Content Editor`)
   - **Description**: What the role does
4. Select permissions from categories:
   - Users Management
   - Roles Management
   - Permissions Management
   - Groups Management
   - Loans Management
   - Reports
   - Settings
5. Click "Create Role"

### Assign Roles to Users

1. Go to Admin → Manage User Roles
2. Click "Manage Roles" next to a user
3. Check/uncheck role checkboxes
4. Click "Update Roles"

**Note:** The system tracks:
- Which admin assigned the role
- When it was assigned
- You can revoke roles individually

### Add New Permissions

1. Go to Admin → Manage Permissions
2. Click "Create Permission"
3. Enter:
   - **Permission Name**: `category.action` format (e.g., `articles.publish`)
   - **Display Name**: `Articles Publish`
   - **Description**: What it allows
4. Click "Create Permission"

### View Role Assignments

1. Go to Admin → Manage Roles
2. Click "View Users" on any role
3. See all users assigned that role
4. Revoke individual assignments if needed

## Default Permissions

All permissions follow `category.action` format:

### Users (5 permissions)
- `users.view` - View users
- `users.create` - Create users
- `users.edit` - Edit users
- `users.delete` - Delete users
- `users.manage_roles` - Manage user roles

### Roles (5 permissions)
- `roles.view`, `roles.create`, `roles.edit`, `roles.delete`, `roles.manage_permissions`

### Permissions (4 permissions)
- `permissions.view`, `permissions.create`, `permissions.edit`, `permissions.delete`

### Groups (4 permissions)
- `groups.view`, `groups.approve`, `groups.edit`, `groups.delete`

### Loans (3 permissions)
- `loans.view`, `loans.approve`, `loans.manage`

### Reports (2 permissions)
- `reports.view`, `reports.export`

### Settings (2 permissions)
- `settings.view`, `settings.manage`

**Total: 25 default permissions**

## Code Integration

### Check Permissions in Code

```php
// Check if user has permission
if (auth()->user()->hasPermission('users.create')) {
    // Allow user creation
}

// Check if user has role
if (auth()->user()->hasRole('super_admin')) {
    // Super admin only code
}

// Check multiple roles
if (auth()->user()->hasRole(['admin', 'moderator'])) {
    // Admin or moderator
}
```

### In Blade Templates

```blade
@if(auth()->user()->hasPermission('users.create'))
    <button>Create User</button>
@endif

@if(auth()->user()->hasRole('super_admin'))
    <div>Super admin only content</div>
@endif
```

### Programmatic Role/Permission Assignment

```php
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

$user = User::find(1);
$role = Role::find(1);

// Assign role to user
$user->userRoles()->create([
    'role_id' => $role->id,
    'assigned_by' => auth()->id(),
    'assigned_at' => now()
]);

// Revoke role
$user->userRoles()
    ->where('role_id', $role->id)
    ->delete();

// Add permission to role
$permission = Permission::where('name', 'users.view')->first();
$role->grantPermission($permission);

// Revoke permission from role
$role->revokePermission($permission);
```

## Important Notes

⚠️ **System Roles Cannot Be Edited**
- Super Admin, System Admin, Group Admin, Auditor, Support Staff
- These are protected to maintain system integrity
- Create custom roles if you need different configurations

✓ **Best Practices**
1. Follow `category.action` naming for permissions
2. Use descriptive display names
3. Document custom roles
4. Assign minimum required permissions
5. Regularly audit role assignments

## Database Reset

If you need to reset and reseed:

```bash
php artisan migrate:refresh --seed --class=RolesAndPermissionsSeeder
```

⚠️ This will delete all roles, permissions, and user assignments!

## Troubleshooting

### Roles not appearing?
- Run: `php artisan db:seed --class=RolesAndPermissionsSeeder`
- Clear cache: `php artisan cache:clear`

### Can't access admin dashboard?
- Ensure user has `is_admin = true` in database
- Check AdminMiddleware is configured

### Permission checks not working?
- Verify permission name matches exactly
- Use lowercase with dots: `users.create`

## Related Files

- **Models:** `app/Models/Role.php`, `Permission.php`, `UserRole.php`
- **Controller:** `app/Http/Controllers/Admin/RolePermissionController.php`
- **Routes:** `routes/admin.php`
- **Views:** `resources/views/admin/roles/`, `permissions/`, `user-roles/`
- **Migration:** `database/migrations/*create_roles_and_permissions_tables.php`
- **Seeder:** `database/seeders/RolesAndPermissionsSeeder.php`

## Next Steps

1. ✅ Run migrations
2. ✅ Run seeders
3. ✅ Access Admin Dashboard
4. ✅ Create custom roles (if needed)
5. ✅ Assign roles to users
6. ✅ Use in application code
