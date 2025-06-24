
@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Roles & Permissions</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold mb-2">Admin Users ({{ $admins->count() }})</h2>
            <ul class="list-disc pl-5 space-y-1">
                @forelse ($admins as $admin)
                    <li>{{ $admin->name }} ({{ $admin->email }})</li>
                @empty
                    <li>No admin users found.</li>
                @endforelse
            </ul>
        </div>

        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-lg font-semibold mb-2">Regular Users ({{ $users->count() }})</h2>
            <ul class="list-disc pl-5 space-y-1">
                @forelse ($users as $user)
                    <li>{{ $user->name }} ({{ $user->email }})</li>
                @empty
                    <li>No regular users found.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
