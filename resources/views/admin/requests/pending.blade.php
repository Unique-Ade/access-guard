@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Pending Requests</h1>

    @if ($requests->isEmpty())
        <p class="text-gray-600">No pending requests at the moment.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white shadow rounded">
                <thead class="bg-gray-100 text-left text-sm">
                    <tr>
                        <th class="p-3">User</th>
                        <th class="p-3">Type</th>
                        <th class="p-3">Message</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr class="border-b hover:bg-gray-50 text-sm">
                            <td class="p-3">{{ $request->user->name }}</td>
                            <td class="p-3">{{ $request->type }}</td>
                            <td class="p-3">{{ $request->message }}</td>
                            <td class="p-3">
                                <span class="text-yellow-600 font-semibold">{{ ucfirst($request->status) }}</span>
                            </td>
                            <td class="p-3">{{ $request->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $requests->links() }}
        </div>
    @endif
@endsection