<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Models\UserActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogRegisteredUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event)
    {
        $user = $event->user;

        UserActivity::create([
            'user_id' => $user->id,
            'activity' => 'New user ' . $user->name . ' registered',
        ]);
    }
}
