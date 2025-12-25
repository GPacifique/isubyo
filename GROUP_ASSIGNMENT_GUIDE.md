# Group Assignment to Users - Complete Guide

## Overview
This guide covers how to assign users to groups in the ItSinda admin system. The system provides multiple ways to manage group memberships, from individual assignments to bulk role management.

## 1. Quick Access Paths

### Path 1: Via Groups List
1. Navigate to **Admin Dashboard** → **Groups** 
2. Click **"View"** or **"Edit"** on a group
3. On the group detail page, click **"Manage Members"** (indigo button)

### Path 2: Via Group Detail Page
1. Go to **Admin Dashboard** → **Groups**
2. Click **"View"** on a group
3. View existing members in the Members Table
4. Click **"Manage Members"** button at top

### Path 3: Direct URL
- Group Members: `/admin/groups/{group-id}/members`
- Create Member: `/admin/groups/{group-id}/members/create`

## 2. Assigning a User to a Group

### Step-by-Step Instructions

**Step 1: Navigate to Group Members**
- Go to Groups Management
- Select a group and click "Manage Members"

**Step 2: Add New Member**
- Click the **"➕ Add New Member"** button (green)

**Step 3: Fill Member Form**
The create member form includes:

| Field | Description | Required |
|-------|-------------|----------|
| **Select User** | Dropdown of available users (not yet in group) | ✅ Yes |
| **Role** | admin, treasurer, or member | ✅ Yes |
| **Status** | active, inactive, or suspended | ✅ Yes |

### Role Definitions

| Role | Permissions | Use Case |
|------|-----------|----------|
| **Admin** | Full group management, member management, financial oversight | Group leaders/treasurers |
| **Treasurer** | Record savings, loans, transactions; manage finances | Financial managers |
| **Member** | View own loans/savings; participate in group | Regular members |

### Status Options

| Status | Description |
|--------|-------------|
| **Active** | Member can fully participate |
| **Inactive** | Member temporarily suspended from participation |
| **Suspended** | Member is banned/removed |

**Step 4: Submit Form**
- Click **"Add Member"** button (green)
- System validates:
  - User isn't already in group
  - User exists and is valid
  - Role and status are valid
- Success message appears
- Redirected to members list

## 3. Managing Existing Members

### Viewing Members
Each group shows all members in a table with:
- Member name and email
- Assigned role (color-coded badges)
- Join date
- Current status
- Action buttons

### Editing Member Role/Status
1. Go to **Manage Members** for a group
2. Find the member in the list
3. Click **"Edit"** button (yellow)
4. Update:
   - Role assignment
   - Member status
   - Financial statistics (read-only for reference)
5. Click **"Update Member"** (green button)

### Removing a Member
1. Go to **Manage Members** for a group
2. Find the member
3. Click **"Edit"** button
4. Scroll to **"Danger Zone"** section
5. Click **"Remove from Group"** button (red)
6. Confirm removal
- Member is soft-deleted (audit trail maintained)
- Can be restored if needed later

## 4. Bulk Role Assignment

### When to Use
- Assign roles to multiple members at once
- Quickly update member statuses across group
- Re-organize group hierarchy

### How to Access
1. Navigate to group members
2. Click **"Bulk Assign Roles"** button (blue)
3. Or use URL: `/admin/groups/{group-id}/role-assignments`

### Bulk Assignment Process
1. View table with all group members
2. For each member, adjust:
   - Role dropdown (admin/treasurer/member)
   - Status dropdown (active/inactive/suspended)
3. Click **"Update All Roles"** button (green)
4. System validates and updates all members at once
5. Confirmation message shows success

## 5. Permission Matrix

### View Available Permissions by Role
1. Go to group detail page
2. Click **"Permission Matrix"** button (purple)
3. View 8×3 matrix showing:
   - All 8 available permissions
   - Which roles have which permissions
   - Color-coded role sections
   - Member count by role

### Available Permissions
1. **manage_members** - Add/remove group members
2. **manage_finances** - Record financial transactions
3. **approve_loans** - Approve/reject loan requests
4. **approve_savings** - Approve savings contributions
5. **view_reports** - View group financial reports
6. **edit_group** - Edit group information
7. **manage_roles** - Assign roles to members
8. **audit_logs** - View audit trail and activity logs

### Permission Matrix Key
| Role | Icon | manage_members | manage_finances | approve_loans | approve_savings | view_reports | edit_group | manage_roles | audit_logs |
|------|------|---|---|---|---|---|---|---|---|
| **Admin** | 👑 | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| **Treasurer** | 💰 | ✗ | ✓ | ✓ | ✓ | ✓ | ✗ | ✗ | ✓ |
| **Member** | 👤 | ✗ | ✗ | ✗ | ✗ | ✓ | ✗ | ✗ | ✗ |

## 6. Routes & Navigation

### Group Member Routes
| Route | Method | URL | Purpose |
|-------|--------|-----|---------|
| List Members | GET | `/admin/groups/{id}/members` | View all members |
| Create Member | GET | `/admin/groups/{id}/members/create` | Form to add member |
| Store Member | POST | `/admin/groups/{id}/members` | Save new member |
| Edit Member | GET | `/admin/groups/{id}/members/{member}/edit` | Form to edit member |
| Update Member | PUT | `/admin/groups/{id}/members/{member}` | Save member changes |
| Delete Member | DELETE | `/admin/groups/{id}/members/{member}` | Remove member |

### Group Role Assignment Routes
| Route | Method | URL | Purpose |
|-------|--------|-----|---------|
| Bulk Assignment | GET | `/admin/groups/{id}/role-assignments` | View bulk form |
| Update Roles | PUT | `/admin/groups/{id}/role-assignments` | Save bulk changes |
| Permission Matrix | GET | `/admin/groups/{id}/permissions` | View permissions |

## 7. Dashboard Integration

### Group Members View
The **Group Members Management** includes:
- Full pagination (15 members per page)
- Search/filter capability
- Color-coded role badges
- Status indicators
- Edit/delete actions
- Quick statistics

### Member Financial Tracking
On member edit page, view:
- Current savings balance
- Total contributions
- Total withdrawn
- Total borrowed (loans)
- Total repaid
- Outstanding loans
- Join date

## 8. Best Practices

### When Assigning Roles

✅ **Do:**
- Assign multiple admins for backup/continuity
- Make financial officers treasurers
- Start new members as regular members
- Review roles quarterly
- Document role assignments in records

❌ **Don't:**
- Assign admin role to all members (security risk)
- Change roles without member notification
- Remove all admins from a group
- Assign conflicting responsibilities

### Data Integrity

✅ **Validation:**
- Prevents duplicate memberships
- Checks user exists in system
- Validates role selections
- Confirms status values
- Maintains referential integrity

❌ **Constraints:**
- User can't be added to same group twice
- User must exist before assignment
- Must select valid role
- Must select valid status

## 9. Troubleshooting

### User Not Appearing in Dropdown
**Problem:** User doesn't show in "Select User" dropdown  
**Solution:** 
- User is already in the group - remove and re-add
- User account doesn't exist - create user first in Users management
- User is deleted (soft delete) - restore from database if needed

### Can't Edit Member Role
**Problem:** Member's role can't be changed  
**Solution:**
- Ensure you're in the edit form (not view)
- Check member status is "active"
- Refresh page and try again
- Check browser console for errors

### Bulk Update Not Working
**Problem:** Bulk role assignment fails  
**Solution:**
- Verify all members have valid role selections
- Check all status fields have selections
- Ensure no required fields are empty
- Try updating fewer members at once

### Permission Denied Errors
**Problem:** Getting "Unauthorized" or 403 error  
**Solution:**
- Confirm you're logged in as system admin
- Check Admin Middleware is not blocking access
- Verify `is_admin` flag on your user account
- Clear application cache: `php artisan cache:clear`

## 10. Advanced Features

### Soft Deletes
- Removed members aren't permanently deleted
- Audit trail maintained for compliance
- Can be restored through database queries if needed

### Status Management
Three-tier status system allows:
- **Active:** Full participation
- **Inactive:** Temporary suspension (preserved data)
- **Suspended:** Permanent ban with audit trail

### Role-Based Access Control
Every group operation checks member role:
- Loans require treasurer or admin approval
- Savings need treasurer verification
- Financial reports limited by role
- Member management restricted to admins

### Financial Tracking
Each group member tracks:
- Savings contributions and balance
- Loan borrowing and repayment history
- Interest earned on savings
- Total participation metrics

## 11. API Reference

### Controller Methods
```php
// List group members
AdminDashboardController::groupMembers(Group $group)

// Show create form
AdminDashboardController::createGroupMember(Group $group)

// Store new member
AdminDashboardController::storeGroupMember(Group $group)

// Show edit form
AdminDashboardController::editGroupMember(Group $group, GroupMember $member)

// Update member
AdminDashboardController::updateGroupMember(Group $group, GroupMember $member)

// Delete member
AdminDashboardController::deleteGroupMember(Group $group, GroupMember $member)

// Bulk role assignment
RolePermissionController::groupRoleAssignments(Group $group)

// Update bulk roles
RolePermissionController::updateGroupRoleAssignments(Group $group)

// View permission matrix
RolePermissionController::groupPermissionMatrix(Group $group)
```

### Model Methods
```php
// User relationships
$user->groupMembers()           // All group memberships
$user->groups()                 // All groups user belongs to
$user->activeGroups()          // Only active memberships
$user->isGroupAdmin(Group)     // Check if admin of group
$user->isGroupTreasurer(Group) // Check if treasurer of group
$user->getGroupRole(Group)     // Get specific role in group

// Group relationships
$group->members()              // All members
$group->creator                // Group creator (admin)
$group->approver              // Group approver
```

## 12. Workflow Example

### Complete Group Setup Workflow

**Scenario:** Set up new savings group "Market Traders"

1. **Create Group**
   - Go to Groups → Create New Group
   - Name: "Market Traders"
   - Select Creator/Admin
   - Set Status: Active

2. **Add Group Admin**
   - Navigate to Manage Members
   - Add User: "John Trader" (Role: Admin, Status: Active)

3. **Add Treasurer**
   - Manage Members → Add New Member
   - Select: "Jane Accountant" (Role: Treasurer, Status: Active)

4. **Add Regular Members**
   - Add 5-10 members with Role: Member, Status: Active

5. **Review Permissions**
   - Check Permission Matrix
   - Verify Admin has full access
   - Confirm Treasurer can manage finances
   - Ensure Members see only relevant data

6. **Begin Operations**
   - Admin manages group
   - Treasurer records finances
   - Members participate and view reports

---

## Contact & Support
For issues with group assignments:
1. Check the Troubleshooting section
2. Review validation messages in forms
3. Check browser console for errors
4. Review Laravel logs in `storage/logs/`
5. Contact system administrator

---

**Last Updated:** December 25, 2025  
**Version:** 1.0  
**Status:** Complete
