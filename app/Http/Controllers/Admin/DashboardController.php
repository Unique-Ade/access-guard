<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserActivity;
use App\Models\pendingRequest; //  pending requests model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $activeUsers = User::whereNotNull('email_verified_at')->count();
        $pendingRequests = PendingRequest::where('status', 'pending')->count();; // 

        $recentActivities = UserActivity::latest()->take(10)->get();
         
        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers',
            'pendingRequests',
            'recentActivities'
        ));
    }
}
