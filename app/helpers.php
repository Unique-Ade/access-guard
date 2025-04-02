<?php

use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;

if (!function_exists('logActivity')) {
    function logActivity($activity)
    {
        UserActivity::create([
            'user_id' => Auth::id(),
            'activity' => $activity,
        ]);
    }
}
