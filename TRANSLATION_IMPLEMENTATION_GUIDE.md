# Translation Implementation Guide

## Using Translations in Your Views

Laravel provides the `__()` helper function and `trans()` method for translations. Replace all hardcoded text with translation keys.

### Basic Usage

**Before (Hardcoded):**
```blade
<h1>System Administration</h1>
<p>Welcome back, {{ auth()->user()->name }}</p>
<button>Save</button>
```

**After (Translatable):**
```blade
<h1>{{ __('messages.system_administration') }}</h1>
<p>{{ __('messages.welcome_back') }}, {{ auth()->user()->name }}</p>
<button>{{ __('messages.save') }}</button>
```

## Translation Files Structure

All translations are located in `lang/{locale}/` directory:
- `lang/en/messages.php` - English
- `lang/fr/messages.php` - French  
- `lang/sw/messages.php` - Swahili
- `lang/rw/messages.php` - Kinyarwanda

## Supported Languages

- **en** - English
- **fr** - Français (French)
- **sw** - Kiswahili (Swahili)
- **rw** - Ikinyarwanda (Kinyarwanda)

## Available Translation Keys

### Dashboard & Navigation
- `dashboard` - Dashboard
- `profile` - Profile
- `logout` - Log Out
- `login` - Login
- `register` - Register
- `settings` - Settings
- `home` - Home
- `help` - Help
- `about` - About
- `contact` - Contact

### Admin Dashboard
- `system_administration` - System Administration
- `system_admin_dashboard` - System Admin Dashboard
- `system_overview` - System Overview
- `real_time_statistics` - Real-time statistics and key metrics
- `last_updated` - Last updated
- `system_administrator` - System Administrator
- `welcome_back` - Welcome back
- `full_system_access` - Full system access with complete control
- `last_login` - Last login

### Group Admin Dashboard
- `group_admin_dashboard` - Group Admin Dashboard
- `group_admin` - Group Admin
- `group_management` - Group Management
- `manage_group_members` - Manage group members, loans, and savings
- `view_your_account` - View your account

### Member Dashboard
- `member_dashboard` - Member Dashboard
- `member` - Member
- `my_financial_overview` - My Financial Overview
- `track_loans_and_savings` - Track your loans, savings, and financial health

### KPI Cards & Statistics
- `total_users` - Total Users
- `active_system_users` - Active system users
- `groups` - Groups
- `active_groups` - Active Groups
- `total_groups` - Total Groups
- `total_members` - Total Members
- `total_transactions` - Total Transactions
- `total_loans_amount` - Total Loans Amount
- `total_savings_amount` - Total Savings Amount
- `system_health` - System Health
- `status_normal` - Status Normal
- `total_amount_in_circulation` - Total amount in circulation

### Common Actions
- `save` - Save
- `cancel` - Cancel
- `delete` - Delete
- `edit` - Edit
- `create` - Create
- `update` - Update
- `search` - Search
- `clear` - Clear
- `back` - Back
- `confirm` - Confirm
- `submit` - Submit
- `close` - Close
- `view` - View
- `view_all` - View All
- `view_details` - View Details
- `actions` - Actions
- `select` - Select
- `filter` - Filter
- `export` - Export
- `print` - Print
- `add` - Add
- `add_new` - Add New
- `download` - Download
- `upload` - Upload
- `manage` - Manage
- `assign` - Assign
- `approve` - Approve
- `reject` - Reject
- `pending_review` - Pending Review
- `show_more` - Show More
- `show_less` - Show Less

### Status Values
- `active` - Active
- `inactive` - Inactive
- `pending` - Pending
- `approved` - Approved
- `rejected` - Rejected
- `suspended` - Suspended
- `completed` - Completed
- `disbursed` - Disbursed
- `waived` - Waived
- `overdue` - Overdue
- `paid` - Paid
- `partial` - Partial

### Common Fields
- `name` - Name
- `email` - Email
- `phone` - Phone
- `date` - Date
- `date_from` - Date From
- `date_to` - Date To
- `amount` - Amount
- `type` - Type
- `description` - Description
- `notes` - Notes
- `balance` - Balance
- `total` - Total
- `account` - Account
- `username` - Username
- `password` - Password
- `address` - Address
- `city` - City
- `country` - Country
- `zip_code` - Zip Code

### Loans
- `loan` - Loan
- `loans` - Loans
- `my_loans` - My Loans
- `new_loan` - New Loan
- `loan_request` - Loan Request
- `loan_requests` - Loan Requests
- `active_loans` - Active Loans
- `loan_amount` - Loan Amount
- `principal_amount` - Principal Amount
- `loan_duration` - Loan Duration
- `monthly_charge` - Monthly Charge
- `interest_charge` - Interest Charge
- `due_date` - Due Date
- `maturity_date` - Maturity Date
- `start_date` - Start Date
- `remaining_balance` - Remaining Balance
- `overdue_loans` - Overdue Loans
- `upcoming_loans` - Upcoming Deadlines
- `loan_summary` - Loan Summary
- `total_payback` - Total Payback
- `loan_term` - Loan Term
- `days_left` - Days Left
- `days_overdue` - Days Overdue
- `payment_status` - Payment Status
- `amount_due` - Amount Due
- `repay_loan` - Repay Loan
- `loan_details` - Loan Details

### Savings
- `savings` - Savings
- `my_savings` - My Savings
- `total_savings` - Total Savings
- `savings_balance` - Savings Balance
- `daily_savings` - Daily Savings
- `monthly_savings` - Monthly Savings
- `record_savings` - Record Savings
- `withdraw_savings` - Withdraw Savings
- `member_shares` - Member Shares
- `share_capital` - Share Capital
- `savings_details` - Savings Details

### Interest
- `interest` - Interest
- `total_interest` - Total Interest
- `record_interest` - Record Interest
- `interest_rate` - Interest Rate
- `interest_earned` - Interest Earned

### Penalties
- `penalty` - Penalty
- `penalties` - Penalties
- `total_penalties` - Total Penalties
- `waive_penalty` - Waive Penalty
- `penalty_reason` - Penalty Reason
- `penalty_amount` - Penalty Amount

### Groups
- `group` - Group
- `groups` - Groups
- `my_group` - My Group
- `group_info` - Group Information
- `group_members` - Group Members
- `group_loans` - Group Loans
- `group_savings` - Group Savings
- `group_settings` - Group Settings
- `group_details` - Group Details
- `join_group` - Join Group
- `leave_group` - Leave Group
- `member_since` - Member Since
- `group_name` - Group Name
- `group_type` - Group Type
- `created_on` - Created on
- `members_count` - Members
- `total_loans` - Total Loans
- `total_savings` - Total Savings
- `member_role` - Member Role
- `join_date` - Join Date
- `financial_standing` - Financial Standing
- `good` - Good
- `current_balance` - Current Balance

### Transactions
- `transaction` - Transaction
- `transactions` - Transactions
- `recent_transactions` - Recent Transactions
- `transaction_history` - Transaction History
- `transaction_type` - Transaction Type
- `transaction_amount` - Amount
- `transaction_date` - Transaction Date
- `from` - From
- `to` - To
- `receiver` - Receiver
- `sender` - Sender

### Reports
- `reports` - Reports
- `financial_report` - Financial Report
- `statistics` - Statistics
- `report` - Report
- `reports_summary` - Reports Summary
- `generate_report` - Generate Report
- `export_report` - Export Report

### Time-Related
- `today` - Today
- `yesterday` - Yesterday
- `this_week` - This Week
- `this_month` - This Month
- `this_year` - This Year
- `last_7_days` - Last 7 Days
- `last_30_days` - Last 30 Days
- `last_90_days` - Last 90 Days
- `created_at` - Created At
- `updated_at` - Updated At
- `deleted_at` - Deleted At
- `year` - Year
- `month` - Month
- `week` - Week
- `days` - Days
- `months` - Months
- `days_left` - Days Left
- `days_overdue` - Days Overdue

### Messages
- `no_data` - No data available
- `no_members` - No members found
- `no_loans` - No loans found
- `no_savings` - No savings recorded
- `no_transactions` - No transactions found
- `no_penalties` - No penalties found
- `no_results` - No results found
- `success` - Success
- `error` - Error
- `warning` - Warning
- `info` - Information
- `validation_errors` - Validation Errors
- `confirm_delete` - Are you sure you want to delete?
- `operation_successful` - Operation completed successfully
- `loading` - Loading...
- `please_wait` - Please wait...
- `processing` - Processing...
- `something_went_wrong` - Something went wrong
- `try_again` - Try Again
- `page_not_found` - Page Not Found
- `unauthorized` - Unauthorized
- `forbidden` - Forbidden

### Social Support
- `social_support` - Social Support
- `support_fund` - Support Fund
- `support_available` - Available Support
- `support_disbursed` - Support Disbursed
- `support_type` - Support Type
- `support_request` - Support Request
- `new_support_request` - New Support Request
- `death` - Death
- `marriage` - Marriage
- `sickness` - Sickness/Medical
- `emergency` - Emergency
- `support_details` - Support Details

### Users & Roles
- `users` - Users
- `user` - User
- `add_user` - Add User
- `edit_user` - Edit User
- `user_details` - User Details
- `user_role` - User Role
- `user_status` - User Status
- `first_name` - First Name
- `last_name` - Last Name
- `full_name` - Full Name
- `role` - Role
- `roles` - Roles
- `permissions` - Permissions
- `system_admin` - System Admin
- `group_admin` - Group Admin

### Language & Theme
- `language` - Language
- `english` - English
- `french` - Français
- `swahili` - Kiswahili
- `kinyarwanda` - Ikinyarwanda
- `select_language` - Select Language
- `theme` - Theme
- `dark_mode` - Dark Mode
- `light_mode` - Light Mode
- `system_theme` - System Theme

### Dashboards
- `available_dashboards` - Available Dashboards
- `switch` - Switch
- `switch_dashboard` - Switch Dashboard
- `currently_active` - Currently Active
- `manage_entire_system` - Manage entire system
- `switch_to_dashboard` - Switch to Dashboard

## Implementation Tips

1. **Always use `__()` for static text** in Blade templates:
   ```blade
   {{ __('messages.save') }}
   ```

2. **Use `trans()` for dynamic text**:
   ```blade
   {{ trans('messages.hello') }}
   ```

3. **Database and Environment Values** - DO NOT TRANSLATE:
   ```blade
   {{ $user->name }}  <!-- User name from database -->
   {{ config('app.name') }}  <!-- From .env -->
   {{ $group->name }}  <!-- Group name from database -->
   ```

4. **Only hardcoded UI text** should be translated:
   ✅ Button labels
   ✅ Form labels
   ✅ Headers and titles
   ✅ Placeholder text
   ✅ Error/success messages
   ❌ User-provided data
   ❌ Database values
   ❌ Dynamic content

5. **Testing the language switcher**:
   - Click the language dropdown in the header
   - Select a language (en, fr, sw, rw)
   - The page should reload in the selected language
   - The language selection is saved to the session

## Current Language Switcher

The language switcher component is located at:
- `resources/views/components/language-switcher.blade.php`

It automatically displays the current language and allows users to switch between all 4 supported languages.

## Adding New Translations

1. Add the key-value pair to all 4 language files:
   - `lang/en/messages.php`
   - `lang/fr/messages.php`
   - `lang/sw/messages.php`
   - `lang/rw/messages.php`

2. Use the key in your Blade template with `__()` helper

Example:
```php
// Add to all language files
'new_feature' => 'New Feature', // English
'new_feature' => 'Nouvelle Fonctionnalité', // French
'new_feature' => 'Sifa Mpya', // Swahili
'new_feature' => 'Ubwoko Bupya', // Kinyarwanda
```

Then use in view:
```blade
<h2>{{ __('messages.new_feature') }}</h2>
```

## Supported Locales

Set in `config/app.php`:
```php
'locale' => 'en', // Default locale
'fallback_locale' => 'en', // Fallback when translation missing
```

## How It Works

1. **SetLocale Middleware** (`app/Http/Middleware/SetLocale.php`):
   - Checks session for saved locale
   - Falls back to URL parameter `?lang=rw`
   - Falls back to browser Accept-Language header
   - Sets the application locale

2. **LanguageController** (`app/Http/Controllers/LanguageController.php`):
   - Validates the requested locale
   - Stores it in the session
   - Redirects back to previous page

3. **Language Switcher Component** (`resources/views/components/language-switcher.blade.php`):
   - Uses Alpine.js for interactive dropdown
   - Shows current language with flag emoji
   - Links to language switching route

4. **Session Persistence**:
   - Language preference stored in session
   - Persists across requests
   - Can be modified via URL parameter

## Migration Status

✅ All hardcoded text in core views should be replaced with `__('messages.key')`
✅ Database values should NOT be translated
✅ Environment values should NOT be translated
✅ Translation files created for all 4 languages
✅ Language switcher component is responsive and functional
✅ SetLocale middleware handles language detection
