<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLoggerService
{
    /**
     * Log a user activity
     */
    public static function log(
        string $action,
        string $description,
        ?string $modelType = null,
        ?int $modelId = null,
        ?array $data = null,
        ?Request $request = null
    ): ActivityLog {
        $user = auth()->user();
        $req = $request ?? request();

        return ActivityLog::create([
            'user_id' => $user?->id,
            'action' => $action,
            'description' => $description,
            'model_type' => $modelType,
            'model_id' => $modelId,
            'data' => $data,
            'ip_address' => $req->ip(),
            'user_agent' => $req->userAgent(),
            'performed_at' => now(),
        ]);
    }

    /**
     * Log login activity
     */
    public static function logLogin(int $userId, ?Request $request = null): ActivityLog
    {
        $req = $request ?? request();
        $user = \App\Models\User::find($userId);

        return ActivityLog::create([
            'user_id' => $userId,
            'action' => 'login',
            'description' => "User {$user?->name} ({$user?->email}) logged in",
            'ip_address' => $req->ip(),
            'user_agent' => $req->userAgent(),
            'performed_at' => now(),
        ]);
    }

    /**
     * Log logout activity
     */
    public static function logLogout(): ActivityLog
    {
        $user = auth()->user();

        return ActivityLog::create([
            'user_id' => $user?->id,
            'action' => 'logout',
            'description' => "User {$user?->name} ({$user?->email}) logged out",
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'performed_at' => now(),
        ]);
    }

    /**
     * Log group creation
     */
    public static function logGroupCreation(int $groupId, string $groupName): ActivityLog
    {
        return self::log(
            'create_group',
            "Created group: {$groupName}",
            'Group',
            $groupId,
            ['group_name' => $groupName]
        );
    }

    /**
     * Log group update
     */
    public static function logGroupUpdate(int $groupId, string $groupName, array $changes): ActivityLog
    {
        return self::log(
            'update_group',
            "Updated group: {$groupName}",
            'Group',
            $groupId,
            ['changes' => $changes]
        );
    }

    /**
     * Log group deletion
     */
    public static function logGroupDeletion(int $groupId, string $groupName): ActivityLog
    {
        return self::log(
            'delete_group',
            "Deleted group: {$groupName}",
            'Group',
            $groupId,
            ['group_name' => $groupName]
        );
    }

    /**
     * Log member addition
     */
    public static function logMemberAddition(int $memberId, string $memberName, int $groupId): ActivityLog
    {
        return self::log(
            'add_member',
            "Added member {$memberName} to group #{$groupId}",
            'GroupMember',
            $memberId,
            ['group_id' => $groupId, 'member_name' => $memberName]
        );
    }

    /**
     * Log member removal
     */
    public static function logMemberRemoval(int $memberId, string $memberName, int $groupId): ActivityLog
    {
        return self::log(
            'remove_member',
            "Removed member {$memberName} from group #{$groupId}",
            'GroupMember',
            $memberId,
            ['group_id' => $groupId, 'member_name' => $memberName]
        );
    }

    /**
     * Log loan creation
     */
    public static function logLoanCreation(int $loanId, string $memberName, $amount, int $groupId): ActivityLog
    {
        return self::log(
            'create_loan',
            "Created loan for {$memberName} - Amount: {$amount} in group #{$groupId}",
            'Loan',
            $loanId,
            ['amount' => $amount, 'group_id' => $groupId, 'member_name' => $memberName]
        );
    }

    /**
     * Log loan payment
     */
    public static function logLoanPayment(int $loanId, string $memberName, $amount): ActivityLog
    {
        return self::log(
            'record_loan_payment',
            "Recorded payment for {$memberName} - Amount: {$amount}",
            'Loan',
            $loanId,
            ['amount' => $amount, 'member_name' => $memberName]
        );
    }

    /**
     * Log savings transaction
     */
    public static function logSavingsTransaction(int $savingsId, string $memberName, string $type, $amount): ActivityLog
    {
        return self::log(
            'savings_transaction',
            "Savings {$type} for {$memberName} - Amount: {$amount}",
            'Saving',
            $savingsId,
            ['type' => $type, 'amount' => $amount, 'member_name' => $memberName]
        );
    }

    /**
     * Log penalty action
     */
    public static function logPenaltyAction(int $penaltyId, string $memberName, string $action, $amount): ActivityLog
    {
        return self::log(
            'penalty_' . $action,
            "Penalty {$action} for {$memberName} - Amount: {$amount}",
            'Penalty',
            $penaltyId,
            ['action' => $action, 'amount' => $amount, 'member_name' => $memberName]
        );
    }

    /**
     * Get activity logs paginated
     */
    public static function getActivityLogs(int $perPage = 50, ?int $userId = null)
    {
        $query = ActivityLog::orderBy('performed_at', 'desc');

        if ($userId) {
            $query->where('user_id', $userId);
        }

        return $query->paginate($perPage);
    }

    /**
     * Get activity logs filtered by action
     */
    public static function getActivityLogsByAction(string $action, int $perPage = 50)
    {
        return ActivityLog::where('action', $action)
            ->orderBy('performed_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get recent activities (last N records)
     */
    public static function getRecentActivities(int $limit = 100)
    {
        return ActivityLog::orderBy('performed_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get activity logs for a specific model
     */
    public static function getModelActivityLogs(string $modelType, int $modelId)
    {
        return ActivityLog::where('model_type', $modelType)
            ->where('model_id', $modelId)
            ->orderBy('performed_at', 'desc')
            ->get();
    }
}
