<?php

use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;


if (!function_exists('logActivity')) {
    function logActivity($message)
    {
        $user = Auth::user();

        if ($user) {
            UserActivity::create([
                'user_id' => $user->id,
                'activity' => 'User ' . $user->name . ' ' . $message,
            ]);
        }
    }
}
