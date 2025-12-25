# Loan Repayment Management System

## Overview
Complete loan repayment tracking and management system for recording, editing, and managing loan payments with automatic balance calculations.

## Features

### 1. Repayment Recording
- **Route**: `/admin/loans/{loan}/repayments/create`
- Record principal and charge payments
- Automatic total calculation
- Payment method selection (Cash, Bank Transfer, Check, Mobile Money)
- Optional notes field
- Payment date tracking

### 2. Repayment List View
- **Route**: `/admin/loans/{loan}/repayments`
- Display all payments for a loan
- Summary cards showing:
  - Principal amount
  - Total principal paid
  - Remaining balance
  - Payment progress percentage
- Paginated payment records
- Edit/Delete actions for each payment

### 3. Repayment Editing
- **Route**: `/admin/loans/{loan}/repayments/{repayment}/edit`
- Modify payment details
- Auto-adjusting loan balance calculations
- Handles balance reversals on edits

### 4. Automatic Loan Balance Tracking
The system automatically updates loan records when payments are made:
- Updates `total_principal_paid`
- Updates `total_charged`
- Recalculates `remaining_balance`
- Tracks `months_paid`
- Changes status to `completed` when fully paid
- Sets `paid_off_at` date when loan is completed

## Database Structure

### LoanPayment Table
```sql
- id
- loan_id (foreign key)
- principal_paid (decimal)
- charges_paid (decimal)
- total_paid (decimal)
- payment_date (date)
- payment_method (string)
- notes (text)
- recorded_by (user_id)
- timestamps
```

## API Routes

```php
// List repayments for a loan
GET /admin/loans/{loan}/repayments
Route Name: admin.loans.repayments.index

// Show create repayment form
GET /admin/loans/{loan}/repayments/create
Route Name: admin.loans.repayments.create

// Store new repayment
POST /admin/loans/{loan}/repayments
Route Name: admin.loans.repayments.store

// Show edit repayment form
GET /admin/loans/{loan}/repayments/{repayment}/edit
Route Name: admin.loans.repayments.edit

// Update repayment
PUT /admin/loans/{loan}/repayments/{repayment}
Route Name: admin.loans.repayments.update

// Delete repayment
DELETE /admin/loans/{loan}/repayments/{repayment}
Route Name: admin.loans.repayments.destroy
```

## Controller Methods

All methods in `AdminDashboardController`:

1. **loanRepayments(Loan $loan)** - Display repayments list
2. **createRepayment(Loan $loan)** - Show create form
3. **storeRepayment(Loan $loan)** - Save new repayment
4. **editRepayment(Loan $loan, $repayment)** - Show edit form
5. **updateRepayment(Loan $loan, $repayment)** - Update repayment
6. **deleteRepayment(Loan $loan, $repayment)** - Delete repayment

## Validation Rules

### Store/Update Repayment
- `principal_paid`: Required, numeric, min 0.01
- `charges_paid`: Required, numeric, min 0
- `total_paid`: Required, numeric, min 0.01
- `payment_date`: Required, date
- `payment_method`: Optional, string max 100
- `notes`: Optional, string

## Views

### Index View
- Location: `resources/views/admin/loans/repayments/index.blade.php`
- Features:
  - Loan summary cards
  - Payment list table with pagination
  - Edit/Delete buttons per payment
  - Progress bar showing payment percentage

### Create View
- Location: `resources/views/admin/loans/repayments/create.blade.php`
- Features:
  - Loan balance information
  - Principal paid input
  - Charges paid input
  - Auto-calculated total
  - Payment method dropdown
  - Notes textarea
  - JavaScript auto-calculation

### Edit View
- Location: `resources/views/admin/loans/repayments/edit.blade.php`
- Features:
  - Pre-filled payment data
  - Same form structure as create view
  - Balance adjustment logic
  - JavaScript auto-calculation

## Automatic Calculations

### On Payment Store/Update
```php
$loan->total_principal_paid += $principal_paid
$loan->total_charged += $charges_paid
$loan->remaining_balance = max(0, remaining - principal_paid)
$loan->months_paid = ceil(total_principal_paid / monthly_installment)

// Complete loan if paid off
if ($remaining_balance <= 0) {
    $loan->status = 'completed'
    $loan->paid_off_at = now()
}
```

### On Payment Delete
Reverses all calculations and reverts status from 'completed' to 'active' if needed.

## User Permissions
- Only system admins (`is_admin = true`) can access repayment management
- All repayments recorded with `recorded_by` user ID for audit trail

## Integration Points

### Related Models
- **Loan**: hasMany LoanPayment
- **LoanPayment**: belongsTo Loan, belongsTo User (recordedByUser)

### Related Routes
- Access from: `/admin/loans/{loan}` (showLoan view)
- Access from: Loan index with action buttons

## Future Enhancements
- Payment schedules and automated reminders
- Late payment penalties
- Partial payment handling
- Payment receipts/certificates
- Batch payment uploads
- Payment analytics and reports
