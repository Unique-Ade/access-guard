@extends('admin.layout')

@section('content')
<h1>Request Management</h1>
@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Pending Role Upgrade Requests</h1>

@if ($requests->isEmpty())
<p class="text-gray-600">No pending requests at the moment.</p>
@else
<table class="min-w-full bg-white border">
    <thead>
        <tr>
            <th class="px-4 py-2 border">User</th>
            <th class="px-4 py-2 border">Message</th>
            <th class="px-4 py-2 border">Date</th>
            <th class="px-4 py-2 border">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
        <tr>
            <td class="px-4 py-2 border">{{ $request->user->name }} ({{ $request->user->email }})</td>
            <td class="px-4 py-2 border">{{ $request->message }}</td>
            <td class="px-4 py-2 border">{{ $request->created_at->diffForHumans() }}</td>
            <td class="px-4 py-2 border">
                <form action="{{ route('admin.pending-requests.approve', $request->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    <button type="submit" class="text-green-600 hover:underline">Approve</button>
                </form>

                <form action="{{ route('admin.pending-requests.reject', $request->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline ml-2">Reject</button>
                </form>

                <span class="text-sm text-gray-500">Pending</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
@endsection