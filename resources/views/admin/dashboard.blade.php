@extends('admin.layout')

@section('content')
    <h1>Dashboard</h1>

    <div style="display: flex; gap: 20px; margin-bottom: 30px;">
        <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h4>Total Users</h4>
            <p style="font-size: 24px; font-weight: bold;">{{ $totalUsers }}</p>
        </div>

        <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h4>Active Users</h4>
            <p style="font-size: 24px; font-weight: bold;">{{ $activeUsers }}</p>
        </div>

        <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h4>Pending Requests</h4>
            <p style="font-size: 24px; font-weight: bold;">{{ $pendingRequests }}</p>
        </div>
    </div>

    <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
        <h4>Recent Activities</h4>
        <ul>
            @forelse ($recentActivities as $activity)
                <li>
                    {{ $activity->activity }} 
                    <small style="color: #888;">({{ $activity->created_at->diffForHumans() }})</small>
                </li>
            @empty
                <li>No recent activities.</li>
            @endforelse
        </ul>
    </div>
@endsection
