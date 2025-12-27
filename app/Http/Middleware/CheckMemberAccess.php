<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\GroupMember;

/**
 * CheckMemberAccess Middleware
 *
 * Validates that user has member access to at least one group.
 * Supports role hierarchy:
 * - System Admin → Redirect to admin dashboard
 * - Group Admin → Redirect to group admin dashboard
 * - Regular Member → Allowed to continue
 * - Non-Member → Redirect to main dashboard
 */
class CheckMemberAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // TIER 1: System Admin - allow to access member routes
        if ($user->is_admin) {
            return $next($request);
        }

        // TIER 2: Group Admin - allow to access member routes if they're also members
        $groupAdmin = GroupMember::where('user_id', $user->id)
            ->where('role', 'admin')
            ->where('status', 'active')
            ->first();

        // Allow group admins to access member routes if they're also members of a group
        if ($groupAdmin) {
            // Check if they're also a regular member
            $member = GroupMember::where('user_id', $user->id)
                ->whereIn('role', ['member', 'treasurer'])
                ->where('status', 'active')
                ->first();

            if ($member) {
                // They're both admin and member, allow access
                $request->merge([
                    'user_member' => $member,
                ]);
                return $next($request);
            }

            // They're only an admin, redirect to admin dashboard
            return redirect()->route('group-admin.dashboard')
                ->with('info', 'You have group admin access. Use the group admin dashboard to manage your groups.');
        }

        // TIER 3: Regular Member - Check if user is member of any group
        $member = GroupMember::where('user_id', $user->id)
            ->whereIn('role', ['member', 'treasurer'])
            ->where('status', 'active')
            ->first();

        if (!$member) {
            // User has no active group membership
            return redirect()->route('dashboard')
                ->with('warning', 'You are not an active member of any group.');
        }

        // Store member info in request for use in controllers
        $request->merge([
            'user_member' => $member,
        ]);

        return $next($request);
    }
}
