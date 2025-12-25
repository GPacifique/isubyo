# User Roles & Permissions Management System

## Overview

This feature provides a comprehensive Role-Based Access Control (RBAC) system for the admin dashboard. System administrators can manage user roles, permissions, and access control for all users in the system.

## Components Created

### Models

#### 1. **Role** (`app/Models/Role.php`)
- Represents a system role that can be assigned to users
- Has many permissions through the `role_permissions` pivot table
- Supports both system (predefined) and custom roles
- Key methods:
  - `permissions()` - Get all permissions for this role
  - `hasPermission($name)` - Check if role has a specific permission
  - `grantPermission()` - Add permission to role
  - `revokePermission()` - Remove permission from role
  - `syncPermissions()` - Sync multiple permissions

#### 2. **Permission** (`app/Models/Permission.php`)
- Represents a specific action or feature that can be permitted
- Organized by categories (e.g., users, roles, groups, loans)
- Can be assigned to multiple roles
- Belongs to many roles through pivot table

#### 3. **UserRole** (`app/Models/UserRole.php`)
- Junction model tracking role assignments to users
- Records who assigned the role and when
- Relationships:
  - `user()` - The user assigned the role
  - `role()` - The role assigned
  - `assignedBy()` - The admin who made the assignment

#### 4. **UserRolePermission** (`app/Models/UserRolePermission.php`)
- Pivot model for additional user-specific permissions
- Allows direct permission assignment to users if needed

### Controllers

#### **RolePermissionController** (`app/Http/Controllers/Admin/RolePermissionController.php`)

**Roles Management:**
- `roles()` - List all roles with pagination
- `createRole()` - Show role creation form
- `storeRole()` - Store new role
- `editRole()` - Show role edit form
- `updateRole()` - Update role details and permissions
- `deleteRole()` - Delete custom roles
- `roleAssignments()` - View users assigned to a role

**Permissions Management:**
- `permissions()` - List all permissions
- `createPermission()` - Show permission creation form
- `storePermission()` - Create new permission
- `editPermission()` - Show permission edit form
- `updatePermission()` - Update permission
- `deletePermission()` - Delete permission

**User Roles Management:**
- `userRoles()` - List all users with their roles
- `editUserRoles()` - Show user roles edit form
- `updateUserRoles()` - Assign/revoke roles for user
- `revokeUserRole()` - Revoke specific role from user

### Routes

All routes are protected by `auth`, `verified`, and `AdminMiddleware` guards.

```
/admin/roles
  - GET  /                    - List all roles
  - GET  /create              - Create role form
  - POST /                    - Store new role
  - GET  /{role}/edit         - Edit role form
  - PUT  /{role}              - Update role
  - DELETE /{role}            - Delete role
  - GET  /{role}/assignments  - View role assignments

/admin/permissions
  - GET  /                    - List all permissions
  - GET  /create              - Create permission form
  - POST /                    - Store new permission
  - GET  /{permission}/edit   - Edit permission form
  - PUT  /{permission}        - Update permission
  - DELETE /{permission}      - Delete permission

/admin/user-roles
  - GET  /                    - List users with roles
  - GET  /{user}/edit         - Edit user roles form
  - PUT  /{user}              - Update user roles
  - DELETE /{user}/{role}     - Revoke role from user
```

### Views

#### Role Management Views
1. **index.blade.php** - List all roles with actions
2. **create.blade.php** - Create new role with permission selection
3. **edit.blade.php** - Edit role details and permissions
4. **assignments.blade.php** - View users assigned to a role

#### Permission Management Views
1. **index.blade.php** - List permissions grouped by category
2. **create.blade.php** - Create new permission
3. **edit.blade.php** - Edit permission details

#### User Roles Management Views
1. **index.blade.php** - List all users with their assigned roles
2. **edit.blade.php** - Manage roles for a specific user

### Database Tables

#### `roles`
- `id` - Primary key
- `name` - Unique role identifier (e.g., 'super_admin')
- `display_name` - Human-readable name
- `description` - Role description
- `is_system` - Boolean flag for system-defined roles
- `timestamps` - Created/updated timestamps

#### `permissions`
- `id` - Primary key
- `name` - Unique permission identifier (e.g., 'users.view')
- `display_name` - Human-readable name
- `description` - Permission description
- `timestamps` - Created/updated timestamps

#### `role_permissions`
- `id` - Primary key
- `role_id` - Foreign key to roles
- `permission_id` - Foreign key to permissions
- `timestamps` - Created/updated timestamps
- Unique constraint on (role_id, permission_id)

#### `user_roles`
- `id` - Primary key
- `user_id` - Foreign key to users
- `role_id` - Foreign key to roles
- `assigned_by` - Foreign key to users (admin who assigned)
- `assigned_at` - Timestamp when assigned
- `timestamps` - Created/updated timestamps
- Unique constraint on (user_id, role_id)

#### `user_role_permissions`
- `id` - Primary key
- `user_id` - Foreign key to users
- `role_id` - Foreign key to roles
- `permission_id` - Foreign key to permissions
- Unique constraint on (user_id, role_id, permission_id)

### Default Roles

The seeder creates 5 system roles:

1. **Super Admin** - Full system access
   - All permissions granted

2. **System Admin** - Administrative access
   - User management (view, create, edit, assign roles)
   - Role and permission management
   - Group approval and management
   - Loan management
   - Reports and settings

3. **Group Admin** - Group-level access
   - Group management
   - Loan management
   - Report viewing

4. **Auditor** - Read-only access
   - User viewing
   - Group viewing
   - Loan viewing
   - Report viewing and export

5. **Support Staff** - Limited access
   - User viewing
   - Group viewing
   - Loan viewing
   - Report viewing

### Default Permissions

Permissions are organized by category:

#### User Management
- `users.view` - View all users
- `users.create` - Create new users
- `users.edit` - Edit user details
- `users.delete` - Delete users
- `users.manage_roles` - Assign/revoke user roles

#### Role Management
- `roles.view` - View all roles
- `roles.create` - Create new roles
- `roles.edit` - Edit role details
- `roles.delete` - Delete roles
- `roles.manage_permissions` - Assign permissions to roles

#### Permission Management
- `permissions.view` - View all permissions
- `permissions.create` - Create new permissions
- `permissions.edit` - Edit permission details
- `permissions.delete` - Delete permissions

#### Group Management
- `groups.view` - View all groups
- `groups.approve` - Approve pending groups
- `groups.edit` - Edit group details
- `groups.delete` - Delete groups

#### Loan Management
- `loans.view` - View all loans
- `loans.approve` - Approve pending loans
- `loans.manage` - Manage loan details

#### Reports
- `reports.view` - View system reports
- `reports.export` - Export reports

#### Settings
- `settings.view` - View system settings
- `settings.manage` - Manage system settings

## Using the Feature

### Installation

1. **Run Migration:**
   ```bash
   php artisan migrate
   ```

2. **Run Seeders:**
   ```bash
   php artisan db:seed --class=RolesAndPermissionsSeeder
   ```

### Managing Roles

1. Navigate to **Admin Dashboard** → **Roles**
2. Click **Create Role** to add a new role
3. Enter role name (lowercase, underscores only), display name, and description
4. Select permissions from the list organized by category
5. Click **Create Role** to save

### Managing Permissions

1. Navigate to **Admin Dashboard** → **Permissions**
2. Click **Create Permission** to add a new permission
3. Use dot notation for permission names (e.g., `reports.export`)
4. Organize permissions by category

### Assigning Roles to Users

1. Navigate to **Admin Dashboard** → **User Roles**
2. Click **Manage Roles** next to a user
3. Select roles to assign from the available list
4. Click **Update Roles** to save

### View Role Assignments

1. Navigate to **Admin Dashboard** → **Roles**
2. Click **View Users** on any role to see all users with that role
3. Manage assignments from the assignments page

## User Model Methods

The User model has been updated with RBAC methods:

```php
// Check if user has a role
$user->hasRole('super_admin');
$user->hasRole(['admin', 'moderator']); // Check multiple

// Check if user has permission
$user->hasPermission('users.create');

// Get all user permissions
$user->getPermissions();

// Get user roles
$user->roles; // Via relationship
$user->userRoles; // Via UserRole model
```

## Security Features

- **System Role Protection** - System-defined roles cannot be deleted
- **Permission Validation** - Permissions must be properly formatted
- **Assignment Tracking** - Records who assigned each role and when
- **Authorization Checks** - All admin routes protected by AdminMiddleware

## Best Practices

1. **Create Meaningful Roles** - Use descriptive names and descriptions
2. **Follow Permission Naming** - Use `category.action` format
3. **Group Related Permissions** - Organize logically by category
4. **Document Custom Roles** - Add descriptions for clarity
5. **Regular Audits** - Review role assignments periodically
6. **Principle of Least Privilege** - Assign minimum required permissions

## Extending the System

### Add New Permissions

```php
$permission = Permission::create([
    'name' => 'reports.generate',
    'display_name' => 'Generate Reports',
    'description' => 'Can generate system reports'
]);

$role->grantPermission($permission);
```

### Create Custom Roles

```php
$role = Role::create([
    'name' => 'content_manager',
    'display_name' => 'Content Manager',
    'description' => 'Manages system content',
    'is_system' => false
]);

$role->syncPermissions(['reports.view', 'reports.export']);
```

### Assign Roles to Users

```php
$user->userRoles()->create([
    'role_id' => $role->id,
    'assigned_by' => auth()->id(),
    'assigned_at' => now()
]);
```

## Middleware for Permission Checks

You can create middleware to enforce permissions:

```php
// In middleware
if (!auth()->user()->hasPermission($permission)) {
    abort(403, 'Unauthorized');
}
```

## Related Features

- **AdminMiddleware** - Ensures only system admins access admin panel
- **User Model** - Extended with role and permission methods
- **Admin Dashboard** - Central hub for all management operations
- **Group RBAC** - Group-level roles (admin, treasurer, member)
