@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">System Logs</h1>

    <div class="bg-white shadow rounded p-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">User</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Activity</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($logs as $log)
                    <tr>
                        <td class="px-4 py-2">
                            {{ $log->user->name ?? 'Unknown' }} ({{ $log->user->email ?? 'N/A' }})
                        </td>
                        <td class="px-4 py-2">{{ $log->activity }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $log->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">No logs available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $logs->links() }}
        </div>
    </div>
@endsection
