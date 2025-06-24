@extends('admin.layout')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Pending Requests</h1>

    @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 p-2 rounded">
            {{ session('success') }}
        </div>
    @elseif (session('info'))
        <div class="mb-4 text-blue-700 bg-blue-100 p-2 rounded">
            {{ session('info') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-gray-100 text-left text-sm uppercase font-semibold text-gray-600">
                <tr>
                    <th class="py-3 px-4">User</th>
                    <th class="py-3 px-4">Type</th>
                    <th class="py-3 px-4">Message</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Date</th>
                    <th class="py-3 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $request->user->name }}</td>
                        <td class="py-2 px-4 capitalize">{{ str_replace('_', ' ', $request->type) }}</td>
                        <td class="py-2 px-4">{{ $request->message }}</td>
                        <td class="py-2 px-4">
                            <span class="inline-block px-2 py-1 rounded text-xs font-semibold
                                @if($request->status === 'pending') bg-yellow-100 text-yellow-700
                                @elseif($request->status === 'approved') bg-green-100 text-green-700
                                @else bg-red-100 text-red-700 @endif">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="py-2 px-4">{{ $request->created_at->diffForHumans() }}</td>
                        <td class="py-2 px-4">
                            @if ($request->status === 'pending')
                                <form action="{{ route('admin.pending-requests.approve', $request->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">
                                        Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.pending-requests.reject', $request->id) }}" method="POST" class="inline ml-2">
                                    @csrf
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                        Reject
                                    </button>
                                </form>
                            @else
                                <span class="text-sm text-gray-500">No action</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 px-4 text-center text-gray-500">No pending requests</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
