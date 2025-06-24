<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendingRequest;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    // public function requestRoleUpgrade(Request $request)
    // {
    //     $user = Auth::user();

        
    //     $existing = PendingRequest::where('user_id', $user->id)
    //         ->where('type', 'role_upgrade')
    //         ->where('status', 'pending')
    //         ->first();

    //     if ($existing) {
    //         return back()->with('status', 'You already have a pending request.');
    //     }

        
    //     PendingRequest::create([
    //         'user_id' => $user->id,
    //         'type' => 'role_upgrade',
    //         'message' => 'User is requesting to upgrade their role to admin.',
    //         'status' => 'pending',
    //     ]);

    //     return back()->with('status', 'Your role upgrade request has been submitted.');
    // }

    public function requestRoleUpgrade(Request $request)
{
    $user = Auth::user();

    $existing = PendingRequest::where('user_id', $user->id)
        ->where('type', 'role_upgrade')
        ->where('status', 'pending')
        ->first();

    if ($existing) {
        return back()->with('status', 'You already have a pending request.');
    }

    PendingRequest::create([
        'user_id' => $user->id,
        'type' => 'role_upgrade',
        'message' => 'User is requesting to upgrade their role to admin.',
        'status' => 'pending',
    ]);

    logActivity("requested a role upgrade");

    return back()->with('status', 'Your role upgrade request has been submitted.');
}
   

}
